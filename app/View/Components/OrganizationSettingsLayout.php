<?php

namespace App\View\Components;

use App\Models\Organization;
use Illuminate\View\Component;
use Illuminate\View\View;

class OrganizationSettingsLayout extends Component
{
    public function __construct(
        public Organization $organization,
    ) {
    }

    public function render(): View
    {
        return view('layouts.organization-settings');
    }
}
