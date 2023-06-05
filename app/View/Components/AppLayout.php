<?php

namespace App\View\Components;

use App\Http\ViewHelpers\Layout\LayoutViewHelper;
use App\Models\Organization;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(
        public Organization $organization,
    ) {
    }

    public function render(): View
    {
        return view('layouts.app', [
            'layout' => LayoutViewHelper::data($this->organization),
        ]);
    }
}
