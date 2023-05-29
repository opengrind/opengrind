<?php

namespace Tests\Unit\Services;

use App\Models\EmailAddress;
use App\Models\User;
use App\Services\GenerateNewUserDefaultAvatar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class GenerateNewUserDefaultAvatarTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_generates_a_new_avatar_username(): void
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
        (new GenerateNewUserDefaultAvatar())->execute($request);
    }

    private function executeService(User $user): void
    {
        $previousName = $user->username_avatar;

        $request = [
            'user_id' => $user->id,
        ];

        $user = (new GenerateNewUserDefaultAvatar())->execute($request);

        $this->assertInstanceOf(
            User::class,
            $user
        );

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'avatar_username' => $previousName,
        ]);
    }
}
