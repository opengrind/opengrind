<?php

namespace App\Domains\Settings\ManageOffices\Web\Controllers;

use App\Domains\Settings\ManageOffices\Web\ViewHelpers\SettingsOfficeIndexViewHelper;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsOfficeController extends Controller
{
    public function index(): View
    {
        $viewModel = SettingsOfficeIndexViewHelper::data(auth()->user()->organization);

        return view('settings.offices.index', [
            'view' => $viewModel,
        ]);
    }
}
