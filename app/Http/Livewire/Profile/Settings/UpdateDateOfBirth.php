<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Services\UpdateProfileInformation;
use App\Services\UpdateUserDateOfBirth;
use App\Services\UpdateUserTimezone;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateDateOfBirth extends Component
{
    use Actions;

    public ?string $bornAt = '';
    public string $agePreferences = '';

    public function mount(array $view)
    {
        $this->bornAt = $view['bornAt'] ?? '';
        $this->agePreferences = $view['agePreferences'] ?? '';
    }

    public function render()
    {
        return view('profile.settings.partials.livewire-update-user-date-of-birth');
    }

    public function store(): void
    {
        (new UpdateUserDateOfBirth())->execute([
            'user_id' => auth()->user()->id,
            'born_at' => $this->bornAt,
            'age_preferences' => $this->agePreferences,
        ]);

        $this->notification([
            'title' => __('Changes saved'),
            'description' => __('Your profile was successfully saved.'),
            'icon' => 'success',
            'timeout' => 4000,
        ]);

        $this->resetErrorBag();
    }
}
