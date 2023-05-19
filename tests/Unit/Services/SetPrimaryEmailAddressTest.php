<?php

namespace Tests\Unit\Services;

use App\Mail\AccountCreated;
use App\Models\EmailAddress;
use App\Models\Organization;
use App\Models\User;
use App\Services\CreateAccount;
use App\Services\SetPrimaryEmailAddress;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class SetPrimaryEmailAddressTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_sets_the_primary_email_address(): void
    {
        $user = User::factory()->create();
        $email = EmailAddress::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->executeService($user, $email);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new SetPrimaryEmailAddress())->execute($request);
    }

    /** @test */
    public function it_fails_if_email_doesnt_belong_to_user(): void
    {
        $user = User::factory()->create();
        $email = EmailAddress::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($user, $email);
    }

    private function executeService(User $user, EmailAddress $emailAddress): void
    {
        Mail::fake();

        $request = [
            'user_id' => $user->id,
            'email_address_id' => $emailAddress->id,
        ];

        (new SetPrimaryEmailAddress())->execute($request);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'primary_email_address_id' => $emailAddress->id,
        ]);
    }
}
