<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\UpdateUserTimezone;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateUserTimezoneTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_updates_the_timezone_of_the_user(): void
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
        (new UpdateUserTimezone())->execute($request);
    }

    private function executeService(User $user): void
    {
        $request = [
            'user_id' => $user->id,
            'timezone' => '+1',
        ];

        $user = (new UpdateUserTimezone())->execute($request);

        $this->assertInstanceOf(
            User::class,
            $user
        );

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'timezone' => '+1',
        ]);
    }
}
