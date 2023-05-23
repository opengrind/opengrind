<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (auth()->user()->organization_id) {
            return redirect()->route('home.index');
        }

        return view('home.index');
    }
}
