<?php

namespace Tests\Unit\ViewHelpers\Profile\Settings;

use App\Http\ViewHelpers\Profile\Settings\ProfileEmailViewHelper;
use App\Models\EmailAddress;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProfileEmailViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        $user = User::factory()->create();
        $emailAddress = EmailAddress::factory()->create([
            'user_id' => $user->id,
            'email' => 'michael@dundermifflin.com',
        ]);
        $user->primary_email_address_id = $emailAddress->id;
        $user->save();
        $unverifiedEmailAddress = EmailAddress::factory()->create([
            'user_id' => $user->id,
            'email' => 'henri@dundermifflin.com',
            'email_verified_at' => null,
        ]);

        $viewModel = ProfileEmailViewHelper::index($user);

        $this->assertCount(
            3,
            $viewModel
        );

        $this->assertEquals(
            [
                0 => [
                    'id' => $emailAddress->id,
                    'email' => 'michael@dundermifflin.com',
                    'isVerified' => true,
                    'canBeDeleted' => false,
                ],
                1 => [
                    'id' => $unverifiedEmailAddress->id,
                    'email' => 'henri@dundermifflin.com',
                    'isVerified' => false,
                    'canBeDeleted' => true,
                ],
            ],
            $viewModel['emails']->toArray()
        );

        $this->assertEquals(
            [
                0 => [
                    'id' => $emailAddress->id,
                    'email' => 'michael@dundermifflin.com',
                    'isVerified' => true,
                    'canBeDeleted' => false,
                ],
            ],
            $viewModel['verifiedEmails']->toArray()
        );

        $this->assertEquals(
            [
                'id' => $emailAddress->id,
                'email' => 'michael@dundermifflin.com',
                'isVerified' => true,
                'canBeDeleted' => false,
            ],
            $viewModel['primaryEmail']
        );
    }
}
