<?php

namespace Tests\Browser\Domains\Settings\Roles;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageRoleTest extends DuskTestCase
{
    use DatabaseTruncation;

    /** @test */
    public function it_manages_roles(): void
    {
        $user = User::factory()->create([
            'email' => 'regis@dumb.io',
        ]);
        SetupOrganization::dispatch($user->company);

        $this->browse(function (Browser $browser) use ($user) {
            // create a role
            $browser->loginAs($user)
                ->visitRoute('settings.roles.index')
                ->click('@open-modal-button')
                ->waitFor('@name-field')
                ->type('@name-field', 'sub employee')
                ->press('@submit-button')
                ->waitForText('sub employee')
                ->assertSee('sub employee');
        });
    }
}
