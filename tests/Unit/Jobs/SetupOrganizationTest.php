<?php

namespace Tests\Unit\Jobs;

use App\Jobs\SetupOrganization;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SetupOrganizationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_sets_an_organization_up(): void
    {
        $organization = Organization::factory()->create();
        $user = User::factory()->create();
        $member = Member::factory()->create([
            'user_id' => $user->id,
            'organization_id' => $organization->id,
        ]);

        SetupOrganization::dispatchSync($organization, $member);

        $this->assertDatabaseHas('roles', [
            'organization_id' => $organization->id,
            'label_translation_key' => 'Administrator',
        ]);
        $this->assertDatabaseHas('roles', [
            'organization_id' => $organization->id,
            'label_translation_key' => 'User',
        ]);

        $this->assertDatabaseHas('members', [
            'organization_id' => $organization->id,
            'user_id' => $user->id,
            'role_id' => Role::where('label_translation_key', 'Administrator')->first()->id,
        ]);

        $this->assertDatabaseHas('permissions', [
            'action' => 'organization.permissions',
        ]);

        // $this->assertDatabaseHas('issue_types', [
        //     'label_translation_key' => 'Task',
        //     'emoji' => '✅',
        // ]);
    }
}
