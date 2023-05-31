<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Http\ViewHelpers\Profile\Settings\ProfileEmailViewHelper;
use App\Services\CreateUserEmailAddress;
use App\Services\GenerateNewUserDefaultAvatar;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateAvatar extends Component
{
    use Actions;

    public array $avatar;

    public function mount(array $view)
    {
        $this->avatar = $view['avatar'];
    }

    public function render()
    {
        return view('profile.settings.partials.livewire-update-avatar');
    }

    public function store(): void
    {
        $emailAddress = (new CreateUserEmailAddress())->execute([
            'user_id' => auth()->user()->id,
            'email' => $this->emailAddress,
        ]);

        $this->emails->push(ProfileEmailViewHelper::dtoEmailAddress($emailAddress, auth()->user()));

        $this->notification([
            'title' => __('Email address added'),
            'description' => __('An email has been sent to this address.'),
            'icon' => 'success',
            'timeout' => 4000,
        ]);

        $this->emailAddress = '';

        $this->resetErrorBag();
    }

    public function generateNewAvatar(): void
    {
        $user = (new GenerateNewUserDefaultAvatar())->execute([
            'user_id' => auth()->user()->id,
        ]);

        $this->avatar = $user->avatar;

        $this->notification([
            'title' => __('New avatar set'),
            'description' => __('You have now a great new avatar.'),
            'icon' => 'success',
            'timeout' => 4000,
        ]);
    }
}
