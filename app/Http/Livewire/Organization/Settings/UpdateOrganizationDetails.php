<?php

namespace App\Http\Livewire\Organization\Settings;

use App\Services\UpdateOrganizationInformation;
use Livewire\Component;
use Livewire\Redirector;
use WireUi\Traits\Actions;

class UpdateOrganizationDetails extends Component
{
    use Actions;

    public string $name = '';

    public string $description = '';

    public int $organizationId = 0;

    public function mount(array $view)
    {
        $this->name = $view['name'] ?? '';
        $this->description = $view['description'] ?? '';
        $this->organizationId = $view['id'] ?? 0;
    }

    public function render()
    {
        return view('organizations.settings.partials.livewire-update-organization-name');
    }

    public function store(): Redirector
    {
        $organization = (new UpdateOrganizationInformation())->execute([
            'user_id' => auth()->user()->id,
            'organization_id' => $this->organizationId,
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->notification([
            'title' => __('Changes saved'),
            'description' => __('The organization has been updated.'),
            'icon' => 'success',
            'timeout' => 4000,
        ]);

        return redirect()->route('organization.settings.index', [
            'organization' => $organization->slug,
        ]);
    }
}
