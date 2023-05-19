<?php

namespace Tests\Browser\Domains\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateCompanyTest extends DuskTestCase
{
    use DatabaseTruncation;

    /** @test */
    public function it_redirects_to_the_welcome_page_if_user_doesnt_belong_to_a_company(): void
    {
        $user = User::factory()->create([
            'organization_id' => null,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visitRoute('home.index')
                ->assertRouteIs('welcome.index')
                ->click('@link-create-company')
                ->assertRouteIs('create_company.index')
                ->type('@company-name-field', 'My company')
                ->press('@submit-button')
                ->assertRouteIs('home.index');
        });
    }

    /** @test */
    public function it_redirects_to_the_home_page_if_user_belongs_to_a_company(): void
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visitRoute('home.index')
                ->assertRouteIs('home.index');
        });
    }

    /** @test */
    public function it_makes_sure_we_cant_reach_the_welcome_page_if_the_company_already_exists(): void
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visitRoute('welcome.index')
                ->assertRouteIs('home.index')
                ->visitRoute('create_company.index')
                ->assertRouteIs('home.index');
        });
    }
}
