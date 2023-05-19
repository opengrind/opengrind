<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\UpdateProfileInformation;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateProfileInformationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_updates_the_information_of_the_user(): void
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
        (new UpdateProfileInformation())->execute($request);
    }

    private function executeService(User $user): void
    {
        $request = [
            'user_id' => $user->id,
            'first_name' => 'michael',
            'last_name' => 'scott',
            'email' => 'michael.scott@gmail.com',
        ];

        $user = (new UpdateProfileInformation())->execute($request);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => 'michael',
            'last_name' => 'scott',
            'email' => 'michael.scott@gmail.com',
        ]);

        $this->assertInstanceOf(
            User::class,
            $user
        );
    }
}
