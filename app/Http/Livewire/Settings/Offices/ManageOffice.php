<?php

namespace App\Http\Livewire\Settings\Offices;

use App\Domains\Settings\ManageOffices\Services\CreateOffice;
use App\Domains\Settings\ManageOffices\Services\DestroyOffice;
use App\Domains\Settings\ManageOffices\Services\UpdateOffice;
use App\Domains\Settings\ManageOffices\Web\ViewHelpers\SettingsOfficeIndexViewHelper;
use App\Models\Office;
use Illuminate\Support\Collection;
use Livewire\Component;
use WireUi\Traits\Actions;

class ManageOffice extends Component
{
    use Actions;

    public bool $openModal = false;

    public int $editedOfficeId = 0;

    public string $name;

    public bool $isMainOffice = false;

    public Collection $offices;

    public function mount(array $view)
    {
        $this->openModal = false;
        $this->offices = $view['offices'];
    }

    public function render()
    {
        return view('settings.offices.livewire-index');
    }

    public function toggle(): void
    {
        $this->name = '';
        $this->isMainOffice = false;
        $this->openModal = ! $this->openModal;

        if ($this->openModal) {
            $this->emit('focusNameField');
        }
    }

    public function toggleEdit(int $officeId = 0): void
    {
        $this->editedOfficeId = $officeId;

        if ($officeId !== 0) {
            $office = $this->offices->filter(function (array $value, int $key) use ($officeId) {
                return $value['id'] === $officeId;
            })->first();

            $this->emit('focusNameField');
            $this->name = $office['name'];
            $this->isMainOffice = $office['is_main_office'];
        }
    }

    public function store(): void
    {
        $office = (new CreateOffice())->execute([
            'author_id' => auth()->user()->id,
            'name' => $this->name,
            'is_main_office' => $this->isMainOffice,
        ]);

        $this->notification()->success(
            $title = __('Element added'),
            $description = __('The office has been created.'),
        );

        $this->offices->push(SettingsOfficeIndexViewHelper::dto($office));
        $this->name = '';
        $this->isMainOffice = false;
        $this->toggle();
    }

    public function update(int $officeId): void
    {
        $office = Office::where('organization_id', auth()->user()->organization_id)
            ->findOrFail($officeId);

        $office = (new UpdateOffice())->execute([
            'author_id' => auth()->user()->id,
            'office_id' => $officeId,
            'name' => $this->name,
            'is_main_office' => $this->isMainOffice,
        ]);

        $this->editedOfficeId = 0;

        $this->notification()->success(
            $title = __('Changes saved'),
            $description = __('The office has been updated.'),
        );

        $this->offices = $this->offices->map(function (array $value, int $key) use ($office) {
            if ($value['id'] === $office->id) {
                return SettingsOfficeIndexViewHelper::dto($office);
            }

            return $value;
        });
        $this->name = '';
        $this->isMainOffice = false;
    }

    public function confirmDestroy(int $officeId): void
    {
        $office = Office::where('organization_id', auth()->user()->organization_id)
            ->findOrFail($officeId);

        $this->dialog()->confirm([
            'title' => __('Are you sure?'),
            'description' => __('All users who have this permission will be without permissions, meaning they will not be able to do anything in the application.'),
            'icon' => 'trash',
            'iconColor' => 'text-red-600',
            'accept' => [
                'label' => __('Delete'),
                'method' => 'destroy',
                'params' => $office,
            ],
            'reject' => [
                'label' => __('Cancel'),
            ],
        ]);
    }

    public function destroy(Office $office): void
    {
        (new DestroyOffice())->execute([
            'author_id' => auth()->user()->id,
            'office_id' => $office->id,
        ]);

        $this->notification()->success(
            $title = __('Element deleted'),
            $description = __('The office has been deleted.'),
        );

        $this->offices = $this->offices->filter(function (array $value, int $key) use ($office) {
            return $value['id'] != $office->id;
        });
    }
}
