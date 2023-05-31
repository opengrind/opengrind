<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\UpdateUserProfileVisibility;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateUserProfileVisibilityTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_updates_the_visibility_of_the_user(): void
    {
        $user = User::factory()->create();
        $this->executeService($user);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new UpdateUserProfileVisibility())->execute($request);
    }

    private function executeService(User $user): void
    {
        $request = [
            'user_id' => $user->id,
            'has_public_profile' => false,
        ];

        $user = (new UpdateUserProfileVisibility())->execute($request);

        $this->assertInstanceOf(
            User::class,
            $user
        );

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'has_public_profile' => false,
        ]);
    }
}
