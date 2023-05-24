<?php

namespace Tests\Unit\Models;

use App\Models\EmailAddress;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_many_emails(): void
    {
        $user = User::factory()->create();
        EmailAddress::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertTrue($user->emails()->exists());
    }

    /** @test */
    public function it_belongs_to_one_primary_email_address(): void
    {
        $user = User::factory()->create([
            'primary_email_address_id' => EmailAddress::factory(),
        ]);

        $this->assertTrue($user->primaryEmail()->exists());
    }

    /** @test */
    public function it_has_many_members(): void
    {
        $user = User::factory()->create();
        Member::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertTrue($user->members()->exists());
    }

    /** @test */
    public function it_has_many_projects(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $project->projectable_id = $user->id;
        $project->projectable_type = User::class;
        $project->save();

        $this->assertTrue($user->projects()->exists());
    }

    /** @test */
    public function it_gets_the_age(): void
    {
        Carbon::setTestNow(Carbon::create(2018, 1, 1));
        $user = User::factory()->create();

        $this->assertNull($user->age);

        $user->born_at = Carbon::create(1990, 3, 14);
        $user->age_preferences = User::AGE_ONLY_MONTH_DAY;
        $user->save();

        $this->assertEquals('Mar 14', $user->age);

        $user->age_preferences = User::AGE_FULL;
        $user->save();
        $this->assertEquals('Mar 14, 1990 (27)', $user->age);
    }

    /** @test */
    public function it_gets_the_primary_email_address(): void
    {
        $user = User::factory()->create();

        $this->assertNull($user->email);
    }

    /** @test */
    public function it_tells_if_the_user_is_part_of_an_organization(): void
    {
        $organization = Organization::factory()->create();

        $user = User::factory()->create();
        $this->assertFalse($user->isMemberOfOrganization($organization));

        Member::factory()->create([
            'user_id' => $user->id,
            'organization_id' => $organization->id,
        ]);
        $this->assertTrue($user->isMemberOfOrganization($organization));
    }
}
