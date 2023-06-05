<?php

namespace Tests\Unit\ViewHelpers\Organizations\Settings;

use App\Http\ViewHelpers\Organizations\Settings\OrganizationSettingsRoleViewHelper;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrganizationSettingsRoleViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        $organization = Organization::factory()->create();

        $viewModel = OrganizationSettingsRoleViewHelper::index($organization);

        $this->assertArrayHasKey('roles', $viewModel);
        $this->assertArrayHasKey('all_possible_permissions', $viewModel);
    }

    /** @test */
    public function it_gets_the_data_needed_for_the_role(): void
    {
        $role = Role::factory()->create([
            'label' => 'janitor',
        ]);

        $array = OrganizationSettingsRoleViewHelper::role($role);

        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('label', $array);
        $this->assertArrayHasKey('permissions', $array);

        $this->assertEquals(
            $role->id,
            $array['id']
        );
        $this->assertEquals(
            'janitor',
            $array['label']
        );
    }

    /** @test */
    public function it_gets_the_data_needed_for_the_permission(): void
    {
        $permission = Permission::factory()->create([
            'label_translation_key' => 'janitor',
        ]);

        $array = OrganizationSettingsRoleViewHelper::permission($permission);

        $this->assertEquals(
            [
                'id' => $permission->id,
                'label' => 'janitor',
                'active' => true,
            ],
            $array
        );
    }
}
