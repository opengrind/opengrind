<?php

namespace App\View\Components;

use App\Http\ViewHelpers\Layout\LayoutViewHelper;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function render(): View
    {
        return view('layouts.guest', [
            'layout' => LayoutViewHelper::data(),
        ]);
    }
}
