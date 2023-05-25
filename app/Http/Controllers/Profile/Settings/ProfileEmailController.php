<?php

namespace App\Http\Controllers\Profile\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewHelpers\Profile\Settings\ProfileEmailViewHelper;
use Illuminate\View\View;

class ProfileEmailController extends Controller
{
    public function index(): View
    {
        $viewModel = ProfileEmailViewHelper::index(auth()->user());

        return view('profile.emails.index', [
            'view' => $viewModel,
        ]);
    }
}
