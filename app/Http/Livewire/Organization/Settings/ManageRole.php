<?php

namespace App\Http\Livewire\Organization\Settings;

use App\Http\ViewHelpers\Organizations\Settings\OrganizationSettingsRoleViewHelper;
use App\Models\Role;
use App\Services\CreateRole;
use App\Services\DestroyRole;
use App\Services\UpdateRole;
use Illuminate\Support\Collection;
use Livewire\Component;
use WireUi\Traits\Actions;

class ManageRole extends Component
{
    use Actions;

    public bool $openModal = false;

    public int $editedRoleId = 0;

    public string $roleLabel = '';

    public int $organizationId = 0;

    public Collection $roles;

    public Collection $allPossiblePermissions;

    public array $permissions = [];

    public function mount(array $view)
    {
        $this->openModal = false;
        $this->roles = $view['roles'];
        $this->allPossiblePermissions = $view['all_possible_permissions'];
        $this->organizationId = $view['organization']['id'];
    }

    public function render()
    {
        return view('organizations.settings.roles.partials.livewire-index');
    }

    public function toggle(): void
    {
        $this->openModal = ! $this->openModal;
        $this->roleLabel = '';

        if ($this->openModal) {
            $this->emit('focusNameField');
        }
    }

    public function toggleEdit(int $roleId = 0): void
    {
        $this->editedRoleId = $roleId;

        if ($roleId !== 0) {
            $role = $this->roles->filter(function (array $value, int $key) use ($roleId) {
                return $value['id'] === $roleId;
            })->first();

            $this->emit('focusNameField');
            $this->roleLabel = $role['label'];
            $this->permissions = $role['permissions'];
        }
    }

    public function store(): void
    {
        dd($this->roleLabel);
        $role = (new CreateRole())->execute([
            'author_id' => auth()->user()->id,
            'organization_id' => $this->organizationId,
            'label' => $this->roleLabel,
            'permissions' => $this->allPossiblePermissions->toArray(),
        ]);

        $this->notification()->success(
            $title = __('Element added'),
            $description = __('The role has been created.'),
        );

        $this->roles->push(OrganizationSettingsRoleViewHelper::role($role));
        $this->reset(['roleLabel']);
        $this->toggle();
    }

    public function update(int $roleId): void
    {
        $role = Role::where('organization_id', auth()->user()->organization_id)
            ->findOrFail($roleId);

        $role = (new UpdateRole())->execute([
            'author_id' => auth()->user()->id,
            'organization_id' => $this->organizationId,
            'role_id' => $roleId,
            'label' => $this->roleLabel,
            'permissions' => $this->permissions,
        ]);

        $this->editedRoleId = 0;

        $this->notification()->success(
            $title = __('Changes saved'),
            $description = __('The role has been updated.'),
        );

        $this->roles = $this->roles->map(function (array $value, int $key) use ($role) {
            if ($value['id'] === $role->id) {
                return OrganizationSettingsRoleViewHelper::role($role);
            }

            return $value;
        });
        $this->roleLabel = '';
    }

    public function confirmDestroy(int $roleId): void
    {
        $role = Role::where('organization_id', auth()->user()->organization_id)
            ->findOrFail($roleId);

        $this->dialog()->confirm([
            'title' => __('Are you sure?'),
            'description' => __('All users who have this permission will be without permissions, meaning they will not be able to do anything in the application.'),
            'icon' => 'trash',
            'iconColor' => 'text-red-600',
            'accept' => [
                'label' => __('Delete'),
                'method' => 'destroy',
                'params' => $role,
            ],
            'reject' => [
                'label' => __('Cancel'),
            ],
        ]);
    }

    public function destroy(Role $role): void
    {
        (new DestroyRole())->execute([
            'author_id' => auth()->user()->id,
            'role_id' => $role->id,
        ]);

        $this->notification()->success(
            $title = __('Element deleted'),
            $description = __('The role has been deleted.'),
        );

        $this->roles = $this->roles->filter(function (array $value, int $key) use ($role) {
            return $value['id'] != $role->id;
        });
    }
}
