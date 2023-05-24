<?php

namespace App\Http\Controllers\Profile\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewHelpers\Profile\Settings\ProfileSettingsViewHelper;
use Illuminate\View\View;

class ProfileSettingsController extends Controller
{
    public function index(): View
    {
        $viewModel = ProfileSettingsViewHelper::index(auth()->user());

        return view('profile.settings.index', [
            'view' => $viewModel,
        ]);
    }
}
