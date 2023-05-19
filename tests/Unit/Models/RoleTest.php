<?php

namespace Tests\Unit\Models;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_one_organization()
    {
        $role = Role::factory()->create();
        $this->assertTrue($role->organization()->exists());
    }

    /** @test */
    public function it_has_many_permissions()
    {
        $permission = Permission::factory()->create();
        $role = Role::factory()->create();
        $role->permissions()->attach($permission);

        $this->assertTrue($role->permissions()->exists());
    }

    /** @test */
    public function it_gets_the_custom_label_if_defined()
    {
        $role = Role::factory()->create([
            'label' => 'this is the real name',
            'label_translation_key' => 'life_event_category.label',
        ]);

        $this->assertEquals(
            'this is the real name',
            $role->label
        );

        $role = Role::factory()->create([
            'label' => null,
            'label_translation_key' => 'life_event_category.label',
        ]);

        $this->assertEquals(
            'life_event_category.label',
            $role->label
        );
    }
}
