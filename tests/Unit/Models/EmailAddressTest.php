<?php

namespace Tests\Unit\Models;

use App\Models\EmailAddress;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EmailAddressTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_a_user(): void
    {
        $email = EmailAddress::factory()->create();

        $this->assertTrue($email->user()->exists());
    }
}
