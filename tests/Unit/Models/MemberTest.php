<?php

namespace Tests\Unit\Models;

use App\Models\Member;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_a_user(): void
    {
        $user = User::factory()->create();
        $member = Member::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertTrue($member->user()->exists());
    }

    /** @test */
    public function it_belongs_to_an_organization(): void
    {
        $organization = Organization::factory()->create();
        $member = Member::factory()->create([
            'organization_id' => $organization->id,
        ]);

        $this->assertTrue($member->organization()->exists());
    }

    /** @test */
    public function it_belongs_to_a_role(): void
    {
        $role = Role::factory()->create();
        $member = Member::factory()->create([
            'role_id' => $role->id,
        ]);

        $this->assertTrue($member->role()->exists());
    }

    /** @test */
    public function it_checks_if_a_member_can_do_an_action()
    {
        $member = Member::factory()->create();
        $role = Role::factory()->create();
        $permission = Permission::factory()->create([
            'action' => 'organization.permissions',
        ]);
        $role->permissions()->syncWithoutDetaching([$permission->id => ['active' => true]]);
        $member->role_id = $role->id;
        $member->save();

        $this->assertTrue($member->hasTheRightTo('organization.permissions'));
    }

    /** @test */
    public function it_checks_if_a_user_cant_do_an_action()
    {
        $member = Member::factory()->create();
        $role = Role::factory()->create();
        $permission = Permission::factory()->create([
            'action' => 'organization.permissions',
        ]);
        $role->permissions()->syncWithoutDetaching([$permission->id => ['active' => false]]);
        $member->role_id = $role->id;
        $member->save();

        $this->assertFalse($member->hasTheRightTo('organization.permissions'));
    }
}
