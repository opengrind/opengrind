<?php

namespace Tests\Unit\Services;

use App\Models\Organization;
use App\Models\User;
use App\Services\CreateAccount;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_creates_an_account(): void
    {
        $this->executeService();
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new CreateAccount())->execute($request);
    }

    /** @test */
    public function it_fails_if_slug_already_exists(): void
    {
        User::factory()->create([
            'slug' => 'johnny',
        ]);

        $this->expectException(Exception::class);
        $this->executeService();
    }

    /** @test */
    public function it_fails_if_slug_already_exists_for_organization(): void
    {
        Organization::factory()->create([
            'slug' => 'johnny',
        ]);

        $this->expectException(Exception::class);
        $this->executeService();
    }

    private function executeService(): void
    {
        Mail::fake();

        $request = [
            'email' => 'john@email.com',
            'password' => 'johnny',
            'username' => 'johnny',
        ];

        $user = (new CreateAccount())->execute($request);

        $this->assertInstanceOf(
            User::class,
            $user
        );

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'johnny',
            'slug' => 'johnny',
        ]);

        $this->assertEquals(
            'john@email.com',
            $user->email
        );

        $this->assertDatabaseHas('email_addresses', [
            'email' => 'john@email.com',
        ]);
    }
}
