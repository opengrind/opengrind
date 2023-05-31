<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Services\SetPrimaryEmailAddress;
use Illuminate\Support\Collection;
use Livewire\Component;
use WireUi\Traits\Actions;

class ManagePrimaryEmail extends Component
{
    use Actions;

    public Collection $verifiedEmails;

    public int $primaryEmailAddressId = 0;

    public function mount(array $view)
    {
        $this->verifiedEmails = $view['verifiedEmails'] ?? collect();
        $this->primaryEmailAddressId = $view['primaryEmail']['id'] ?? [];
    }

    public function render()
    {
        return view('profile.emails.partials.livewire-primary-email');
    }

    public function store(): void
    {
        (new SetPrimaryEmailAddress())->execute([
            'user_id' => auth()->user()->id,
            'email_address_id' => $this->primaryEmailAddressId,
        ]);

        $this->notification([
            'title' => __('Changed saved'),
            'description' => __('The primary email address has been set.'),
            'icon' => 'success',
            'timeout' => 4000,
        ]);

        $this->resetErrorBag();
    }
}
