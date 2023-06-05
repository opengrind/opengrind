<?php

namespace App\Http\Controllers\Organizations\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewHelpers\Organizations\Settings\OrganizationSettingsRoleViewHelper;
use App\Models\Organization;
use Illuminate\View\View;

class OrganizationSettingsRoleController extends Controller
{
    public function index(Organization $organization): View
    {
        $viewModel = OrganizationSettingsRoleViewHelper::index($organization);

        return view('organizations.settings.roles.index', [
            'view' => $viewModel,
            'organization' => $organization,
        ]);
    }
}
