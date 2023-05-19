<?php

namespace Tests\Unit\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Office;
use App\Models\Organization;
use App\Models\Permission;
use App\Services\DestroyOffice;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class DestroyOfficeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_destroys_an_office(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_OFFICES);
        $office = Office::factory()->create([
            'organization_id' => $member->organization_id,
        ]);
        $this->executeService($member, $member->organization, $office);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new DestroyOffice())->execute($request);
    }

    /** @test */
    public function it_cant_execute_the_service_with_the_wrong_permissions(): void
    {
        $member = $this->createMemberWithPermission('wrong permission');
        $office = Office::factory()->create();

        $this->expectException(NotEnoughPermissionException::class);
        $this->executeService($member, $member->organization, $office);
    }

    /** @test */
    public function it_fails_if_office_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_OFFICES);
        $office = Office::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $member->organization, $office);
    }

    /** @test */
    public function it_fails_if_member_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_OFFICES);
        $organization = Organization::factory()->create();
        $office = Office::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $organization, $office);
    }

    private function executeService(Member $member, Organization $organization, Office $office): void
    {
        $request = [
            'author_id' => $member->id,
            'organization_id' => $organization->id,
            'office_id' => $office->id,
        ];

        (new DestroyOffice())->execute($request);

        $this->assertDatabaseMissing('offices', [
            'id' => $office->id,
        ]);
    }
}
