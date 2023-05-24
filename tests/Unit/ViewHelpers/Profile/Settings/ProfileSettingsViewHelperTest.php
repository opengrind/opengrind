<?php

namespace Tests\Unit\ViewHelpers\Profile\Settings;

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
            'has_public_profile' => true,
        ]);

        $viewModel = ProfileSettingsViewHelper::index($user);

        $this->assertCount(
            9,
            $viewModel
        );

        $this->assertEquals(
            'regis',
            $viewModel['firstName']
        );
        $this->assertEquals(
            'boudin',
            $viewModel['lastName']
        );
        $this->assertEquals(
            'djaiss',
            $viewModel['username']
        );
        $this->assertEquals(
            'UTC',
            $viewModel['timezone']
        );
        $this->assertCount(
            421,
            $viewModel['timezones']
        );
        $this->assertEquals(
            'en',
            $viewModel['locale']
        );
        $this->assertEquals(
            User::AGE_HIDDEN,
            $viewModel['agePreferences']
        );
        $this->assertNull($viewModel['bornAt']);
        $this->assertTrue($viewModel['hasPublicProfile']);
    }
}
