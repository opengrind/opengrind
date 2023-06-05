<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SettingsLayout extends Component
{
    public function render(): View
    {
        return view('layouts.settings');
    }
}
