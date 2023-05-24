<?php

namespace App\Http\Livewire\Profile\Settings;

use App\Services\UpdateUserTimezone;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateTimezone extends Component
{
    use Actions;

    public string $timezone = '';

    public array $timezones = [];

    public ?Carbon $currentTime = null;

    public function mount(array $view)
    {
        $this->timezone = $view['timezone'] ?? '';
        $this->timezones = $view['timezones'] ?? [];
        $this->currentTime = Carbon::now();
        $this->currentTime->setTimezone($this->timezone)->format('Y-m-d H:i:s');
    }

    public function render()
    {
        return view('profile.settings.partials.livewire-update-timezone');
    }

    public function store(): void
    {
        (new UpdateUserTimezone())->execute([
            'user_id' => auth()->user()->id,
            'timezone' => $this->timezone,
        ]);

        $this->notification([
            'title' => __('Changes saved'),
            'description' => __('Your profile was successfully saved.'),
            'icon' => 'success',
            'timeout' => 4000,
        ]);

        $this->currentTime->setTimezone($this->timezone)->format('Y-m-d H:i:s');

        $this->resetErrorBag();
    }
}
