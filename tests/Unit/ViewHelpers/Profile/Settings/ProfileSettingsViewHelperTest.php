<?php

namespace Tests\Unit\ViewHelpers\Profile\Settings;

use App\Domains\Settings\ManageSettings\Web\ViewHelpers\SettingsIndexViewHelper;
use App\Http\ViewHelpers\Profile\Settings\ProfileSettingsViewHelper;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProfileSettingsViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        $user = User::factory()->create([
            'first_name' => 'regis',
            'last_name' => 'boudin',
            'username' => 'djaiss',
            'timezone' => 'UTC',
            'locale' => 'en',
            'age_preferences' => User::AGE_HIDDEN,
        ]);

        $viewModel = ProfileSettingsViewHelper::index($user);

        $this->assertEquals(
            [
                'firstName' => 'regis',
                'lastName' => 'boudin',
                'username' => 'djaiss',
                'timezone' => 'UTC',
                'locale' => 'en',
                'agePreferences' => User::AGE_HIDDEN,
            ],
            $viewModel
        );
    }
}
