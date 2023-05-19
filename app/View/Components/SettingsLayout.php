<?php

namespace App\View\Components;

use App\Domains\Layout\Web\ViewHelpers\LayoutViewHelper;
use App\Domains\Settings\ManageSettings\Web\ViewHelpers\SettingsMenuViewHelper;
use Illuminate\View\Component;
use Illuminate\View\View;

class SettingsLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.settings', [
            'layout' => LayoutViewHelper::data(),
            'menu' => SettingsMenuViewHelper::data(auth()->user()),
        ]);
    }
}
