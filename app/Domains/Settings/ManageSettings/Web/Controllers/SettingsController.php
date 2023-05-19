<?php

namespace App\Domains\Settings\ManageSettings\Web\Controllers;

use App\Domains\Settings\ManageSettings\Web\ViewHelpers\SettingsIndexViewHelper;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        $viewModel = SettingsIndexViewHelper::data(auth()->user());

        return view('settings.profile.index', [
            'view' => $viewModel,
        ]);
    }
}
