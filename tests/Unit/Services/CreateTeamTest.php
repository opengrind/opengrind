<?php

namespace Tests\Unit\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Office;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Team;
use App\Services\CreateTeam;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CreateTeamTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_creates_a_team(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_TEAMS);

        $this->executeService($member, $member->organization);
    }

    /** @test */
    public function it_cant_execute_the_service_with_the_wrong_permissions(): void
    {
        $member = $this->createMemberWithPermission('empty permission');

        $this->expectException(NotEnoughPermissionException::class);
        $this->executeService($member, $member->organization);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new CreateTeam())->execute($request);
    }

    /** @test */
    public function it_fails_if_member_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_TEAMS);
        $organization = Organization::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $organization);
    }

    /** @test */
    public function it_fails_if_office_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_TEAMS);
        $organization = Organization::factory()->create();
        $office = Office::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $organization, $office);
    }

    /** @test */
    public function it_fails_if_team_lead_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_TEAMS);
        $organization = Organization::factory()->create();
        $teamLead = Member::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $organization, null, $teamLead);
    }

    private function executeService(Member $member, Organization $organization, Office $office = null, Member $teamLead = null): void
    {
        $request = [
            'author_id' => $member->id,
            'organization_id' => $organization->id,
            'office_id' => $office?->id,
            'team_lead_id' => $teamLead?->id,
            'name' => 'Dunder',
            'description' => null,
        ];

        $team = (new CreateTeam())->execute($request);

        $this->assertInstanceOf(
            Team::class,
            $team
        );

        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'organization_id' => $organization->id,
            'office_id' => $office?->id,
            'team_lead_id' => $teamLead?->id,
            'name' => 'Dunder',
            'description' => null,
        ]);
    }
}
