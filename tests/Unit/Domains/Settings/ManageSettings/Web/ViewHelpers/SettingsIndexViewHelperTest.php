<?php

namespace Tests\Unit\Domains\Settings\ManageSettings\Web\ViewHelpers;

use App\Domains\Settings\ManageSettings\Web\ViewHelpers\SettingsIndexViewHelper;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SettingsIndexViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        $user = User::factory()->create([
            'first_name' => 'regis',
            'last_name' => 'boudin',
            'email' => 'regis@boudin.com',
        ]);

        $viewModel = SettingsIndexViewHelper::data($user);

        $this->assertEquals(
            'regis',
            $viewModel['firstName']
        );
        $this->assertEquals(
            'boudin',
            $viewModel['lastName']
        );
        $this->assertEquals(
            'regis@boudin.com',
            $viewModel['email']
        );
    }
}
