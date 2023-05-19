<?php

namespace Tests\Unit\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Office;
use App\Models\Organization;
use App\Models\Permission;
use App\Services\CreateOffice;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CreateOfficeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_creates_an_office(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_OFFICES);

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
        (new CreateOffice())->execute($request);
    }

    /** @test */
    public function it_fails_if_member_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_OFFICES);
        $organization = Organization::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $organization);
    }

    private function executeService(Member $member, Organization $organization): void
    {
        $request = [
            'author_id' => $member->id,
            'organization_id' => $organization->id,
            'name' => 'Dunder',
            'is_main_office' => true,
        ];

        $office = (new CreateOffice())->execute($request);

        $this->assertInstanceOf(
            Office::class,
            $office
        );

        $this->assertDatabaseHas('offices', [
            'id' => $office->id,
            'organization_id' => $organization->id,
            'name' => 'Dunder',
            'is_main_office' => true,
        ]);
    }
}
