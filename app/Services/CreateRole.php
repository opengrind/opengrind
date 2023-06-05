<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Role;

class CreateRole extends BaseService
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'label' => 'required|string|max:255',
            'permissions' => 'nullable|array',
        ];
    }

    public function permissions(): array
    {
        return [
            'user_must_belong_to_organization',
            'user_must_have_the_right_to_edit_organization_roles',
        ];
    }

    public function execute(array $data): Role
    {
        $this->validateRules($data);

        $role = Role::create([
            'organization_id' => $this->organization->id,
            'label' => $data['label'],
        ]);

        foreach ($data['permissions'] as $permission) {
            $permissionObject = Permission::findOrFail($permission['id']);
            $role->permissions()->syncWithoutDetaching([$permissionObject->id => ['active' => $permission['active']]]);
        }

        return $role;
    }
}
