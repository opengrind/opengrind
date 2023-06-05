<?php

namespace Tests\Unit\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Permission;
use App\Services\UpdateOrganizationInformation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateOrganizationInformationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_updates_the_organization_information(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_INFORMATION);

        $this->executeService($member, $member->organization);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new UpdateOrganizationInformation())->execute($request);
    }

    /** @test */
    public function it_cant_execute_the_service_with_the_wrong_permissions(): void
    {
        $member = $this->createMemberWithPermission('wrong permission');

        $this->expectException(NotEnoughPermissionException::class);
        $this->executeService($member, $member->organization);
    }

    /** @test */
    public function it_fails_if_user_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_INFORMATION);
        $organization = Organization::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $organization);
    }

    private function executeService(Member $member, Organization $organization): void
    {
        $request = [
            'user_id' => $member->user_id,
            'organization_id' => $organization->id,
            'name' => 'Dunder',
            'description' => null,
        ];

        $organization = (new UpdateOrganizationInformation())->execute($request);

        $this->assertInstanceOf(
            Organization::class,
            $organization
        );

        $this->assertDatabaseHas('organizations', [
            'id' => $organization->id,
            'name' => 'Dunder',
            'slug' => 'dunder',
        ]);
    }
}
