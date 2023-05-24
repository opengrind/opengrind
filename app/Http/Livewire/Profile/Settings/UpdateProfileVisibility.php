<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Services\UpdateUserProfileVisibility;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateProfileVisibility extends Component
{
    use Actions;

    public string $hasPublicProfile = '';

    public function mount(array $view)
    {
        $this->hasPublicProfile = $view['hasPublicProfile'] ?? '';
    }

    public function render()
    {
        return view('profile.settings.partials.livewire-update-profile-visibility');
    }

    public function store(): void
    {
        (new UpdateUserProfileVisibility())->execute([
            'user_id' => auth()->user()->id,
            'has_public_profile' => (bool) $this->hasPublicProfile,
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
