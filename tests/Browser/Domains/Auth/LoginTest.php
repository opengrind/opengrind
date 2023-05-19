<?php

namespace Tests\Browser\Domains\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseTruncation;

    /** @test */
    public function it_logs_into_an_account(): void
    {
        User::factory()->create([
            'email' => 'regis@dumb.io',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@email-field', 'regis@dumb.io')
                ->type('@password-field', 'password')
                ->press('@submit-button')
                ->assertRouteIs('home.index');
        });
    }
}
