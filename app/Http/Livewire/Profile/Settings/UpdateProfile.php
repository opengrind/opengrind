<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Services\UpdateProfileInformation;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateProfile extends Component
{
    use Actions;

    public string $firstName = '';

    public string $lastName = '';

    public string $username = '';

    public function mount(array $view)
    {
        $this->firstName = $view['firstName'] ?? '';
        $this->lastName = $view['lastName'] ?? '';
        $this->username = $view['username'] ?? '';
    }

    public function render()
    {
        return view('profile.settings.livewire-update-profile');
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
