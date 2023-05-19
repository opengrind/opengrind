<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddUserToOrganization extends BaseService
{
    private array $data;

    private User $user;

    public function rules(): array
    {
        return [
            'author_id' => 'required|integer|exists:members,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'user_id' => 'required|integer|exists:users,id',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function permissions(): string
    {
        return Permission::ORGANIZATION_ADD_MEMBERS;
    }

    public function execute(array $data): Member
    {
        $this->data = $data;
        $this->validate();

        $member = Member::create([
            'organization_id' => $this->organization->id,
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id'],
            'first_name' => $this->user?->first_name,
            'last_name' => $this->user?->last_name,
            'email' => $this->user->email,
            'email_verified_at' => now(),
        ]);

        return $member;
    }

    public function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);

        if ($this->user->isMemberOfOrganization($this->organization)) {
            throw new ModelNotFoundException();
        }

        Role::where('organization_id', $this->organization->id)
            ->findOrFail($this->data['role_id']);
    }
}
