<?php

namespace App\Http\Controllers\Organizations\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewHelpers\Organizations\Settings\OrganizationSettingsViewHelper;
use App\Models\Organization;
use Illuminate\View\View;

class OrganizationSettingsController extends Controller
{
    public function index(Organization $organization): View
    {
        $viewModel = OrganizationSettingsViewHelper::index($organization);

        return view('organizations.settings.index', [
            'view' => $viewModel,
            'organization' => $organization,
        ]);
    }
}
