<?php

namespace Tests\Unit\Services;

use App\Models\Member;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Services\AddUserToOrganization;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Queue;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class AddUserToOrganizationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_a_user_to_an_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_ADD_MEMBERS);
        $user = User::factory()->create();
        $role = Role::factory()->create([
            'organization_id' => $member->organization_id,
        ]);

        $this->executeService($member, $member->organization, $user, $role);
    }

    /** @test */
    public function it_fails_if_wrong_parameters_are_given(): void
    {
        $request = [
            'title' => 'Ross',
        ];

        $this->expectException(ValidationException::class);
        (new AddUserToOrganization())->execute($request);
    }

    /** @test */
    public function it_fails_if_user_already_belongs_to_the_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_ADD_MEMBERS);
        $role = Role::factory()->create([
            'organization_id' => $member->organization_id,
        ]);

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $member->organization, $member->user, $role);
    }

    /** @test */
    public function it_fails_if_role_doesnt_belong_to_the_organization(): void
    {
        $member = $this->createMemberWithPermission(Permission::ORGANIZATION_ADD_MEMBERS);
        $role = Role::factory()->create();
        $user = User::factory()->create();

        $this->expectException(ModelNotFoundException::class);
        $this->executeService($member, $member->organization, $user, $role);
    }

    private function executeService(Member $member, Organization $organization, User $user, Role $role): void
    {
        Carbon::setTestNow(Carbon::create(2018, 1, 1));
        Queue::fake();

        $request = [
            'author_id' => $member->id,
            'organization_id' => $organization->id,
            'user_id' => $user->id,
            'role_id' => $role->id,
        ];

        $member = (new AddUserToOrganization())->execute($request);

        $this->assertInstanceOf(
            Member::class,
            $member
        );

        $this->assertDatabaseHas('members', [
            'id' => $member->id,
            'organization_id' => $organization->id,
            'role_id' => $role->id,
            'email' => $user->email,
            'email_verified_at' => '2018-01-01 00:00:00',
        ]);
    }
}
