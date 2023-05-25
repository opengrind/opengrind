<?php

namespace Tests\Unit\Services;

use App\Exceptions\CantDeletePrimaryEmailAddressException;
use App\Models\EmailAddress;
use App\Models\User;
use App\Services\DestroyUserEmailAddress;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class DestroyUserEmailAddressTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_destroys_an_email_address(): void
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
        (new DestroyUserEmailAddress())->execute($request);
    }

    /** @test */
    public function it_fails_if_email_doesnt_belong_to_user(): void
    {
        $user = User::factory()->create();
        $email = EmailAddress::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($user, $email);
    }

    /** @test */
    public function it_fails_if_email_is_primary_address(): void
    {
        $user = User::factory()->create();
        $email = EmailAddress::factory()->create([
            'user_id' => $user->id,
        ]);
        $user->primary_email_address_id = $email->id;
        $user->save();

        $this->expectException(CantDeletePrimaryEmailAddressException::class);
        $this->executeService($user, $email);
    }

    private function executeService(User $user, EmailAddress $email): void
    {
        $request = [
            'user_id' => $user->id,
            'email_id' => $email->id,
        ];

        (new DestroyUserEmailAddress())->execute($request);

        $this->assertDatabaseMissing('email_addresses', [
            'id' => $email->id,
        ]);
    }
}
