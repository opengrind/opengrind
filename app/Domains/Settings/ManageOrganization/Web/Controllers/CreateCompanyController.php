<?php

namespace App\Domains\Settings\ManageCompany\Web\Controllers;

use App\Domains\Settings\ManageCompany\Services\CreateCompany;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateCompanyController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (auth()->user()->organization_id) {
            return redirect()->route('home.index');
        }

        return view('home.create-company');
    }

    public function store(Request $request): RedirectResponse
    {
        if (auth()->user()->organization_id) {
            return redirect()->route('home.index');
        }

        (new CreateCompany())->execute([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
        ]);

        return redirect()->route('home.index');
    }
}
