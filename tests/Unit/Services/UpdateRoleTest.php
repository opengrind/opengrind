<?php

namespace Tests\Unit\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Role;
use App\Services\UpdateRole;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_updates_a_role(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_PERMISSIONS);

        $role = Role::factory()->create([
            'organization_id' => $member->organization_id,
        ]);
        $this->executeService($member, $member->organization, $role);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new UpdateRole())->execute($request);
    }

    /** @test */
    public function it_cant_execute_the_service_with_the_wrong_permissions(): void
    {
        $member = $this->createMemberWithPermission('wrong permission');
        $role = Role::factory()->create([
            'organization_id' => $member->organization_id,
        ]);

        $this->expectException(NotEnoughPermissionException::class);
        $this->executeService($member, $member->organization, $role);
    }

    /** @test */
    public function it_fails_if_role_doesnt_belong_to_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_MANAGE_PERMISSIONS);
        $role = Role::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $member->organization, $role);
    }

    private function executeService(Member $member, Organization $organization, Role $role): void
    {
        $permission = Permission::factory()->create();

        $request = [
            'user_id' => $member->user_id,
            'organization_id' => $organization->id,
            'role_id' => $role->id,
            'label' => 'Dunder',
            'permissions' => [
                0 => [
                    'id' => $permission->id,
                    'active' => true,
                ],
            ],
        ];

        $role = (new UpdateRole())->execute($request);

        $this->assertInstanceOf(
            Role::class,
            $role
        );

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'label' => 'Dunder',
        ]);

        $this->assertDatabaseHas('permission_role', [
            'permission_id' => $permission->id,
            'role_id' => $role->id,
        ]);
    }
}
