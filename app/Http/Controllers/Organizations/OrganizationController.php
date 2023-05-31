<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CreateOrganization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    public function create(): View|RedirectResponse
    {
        return view('organizations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $organization = (new CreateOrganization())->execute([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'is_public' => $request->input('is_public'),
        ]);

        return redirect()->route('organization.show', [
            'organization' => $organization->slug,
        ]);
    }
}
