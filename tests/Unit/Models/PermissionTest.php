<?php

namespace Tests\Unit\Models;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_many_roles()
    {
        $permission = Permission::factory()->create();
        $role = Role::factory()->create();
        $permission->roles()->attach($role);

        $this->assertTrue($permission->roles()->exists());
    }

    /** @test */
    public function it_gets_the_custom_label_if_defined()
    {
        $permission = Permission::factory()->create([
            'label' => 'this is the real name',
            'label_translation_key' => 'life_event_category.label',
        ]);

        $this->assertEquals(
            'this is the real name',
            $permission->label
        );

        $permission = Permission::factory()->create([
            'label' => null,
            'label_translation_key' => 'life_event_category.label',
        ]);

        $this->assertEquals(
            'life_event_category.label',
            $permission->label
        );
    }
}
