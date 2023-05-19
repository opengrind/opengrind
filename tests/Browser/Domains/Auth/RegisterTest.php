<?php

namespace Tests\Browser\Domains\Auth;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseTruncation;

    /** @test */
    public function it_registers_an_account(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Welcome to OpenGrind')
                ->type('@email-field', 'regis@dumb.io')
                ->type('@password-field', 'admin123')
                ->type('@password-confirmation-field', 'admin123')
                ->press('@submit-button')
                ->assertRouteIs('verification.notice');
        });
    }
}
