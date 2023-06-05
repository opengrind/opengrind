<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Role;

class UpdateRole extends BaseService
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'role_id' => 'required|integer|exists:roles,id',
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

        $role = Role::where('organization_id', $this->organization->id)
            ->findOrFail($data['role_id']);

        $role->label = $data['label'];
        $role->save();

        foreach ($data['permissions'] as $permission) {
            $permissionObject = Permission::findOrFail($permission['id']);
            $role->permissions()->syncWithoutDetaching([$permissionObject->id => ['active' => $permission['active']]]);
        }

        return $role;
    }
}
