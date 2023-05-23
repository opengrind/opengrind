<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Services\UpdateProfileInformation;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateTimezone extends Component
{
    use Actions;

    public string $timezone = '';
    public array $timezones = [];

    public function mount(array $view)
    {
        $this->timezone = $view['timezone'] ?? '';
        $this->timezones = $view['timezones'] ?? [];
    }

    public function render()
    {
        return view('profile.settings.livewire-update-timezone');
    }

    public function store(): void
    {
        (new UpdateProfileInformation())->execute([
            'user_id' => auth()->user()->id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
        ]);

        $this->notification()->success(
            $title = __('Changes saved'),
            $description = __('Your profile was successfully saved.'),
        );
    }
}
