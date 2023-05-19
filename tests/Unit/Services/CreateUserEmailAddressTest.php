<?php

namespace Tests\Unit\Services;

use App\Mail\AccountCreated;
use App\Mail\VerifyEmail;
use App\Models\EmailAddress;
use App\Models\Organization;
use App\Models\User;
use App\Services\CreateAccount;
use App\Services\CreateUserEmailAddress;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CreateUserEmailAddressTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_creates_a_user_email_address(): void
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
        (new CreateUserEmailAddress())->execute($request);
    }

    /** @test */
    public function it_fails_if_email_already_exists(): void
    {
        EmailAddress::factory()->create([
            'email' => 'john@email.com',
        ]);
        $user = User::factory()->create();

        $this->expectException(ValidationException::class);
        $this->executeService($user);
    }

    private function executeService(User $user): void
    {
        Mail::fake();

        $request = [
            'user_id' => $user->id,
            'email' => 'john@email.com',
        ];

        $emailAddress = (new CreateUserEmailAddress())->execute($request);

        $this->assertInstanceOf(
            EmailAddress::class,
            $emailAddress
        );

        $this->assertDatabaseHas('email_addresses', [
            'id' => $emailAddress->id,
            'email' => 'john@email.com',
        ]);

        Mail::assertQueued(VerifyEmail::class);
    }
}
