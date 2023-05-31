<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(User $user): View|RedirectResponse
    {
        if (! $user->has_public_profile && auth()->check() && auth()->id() !== $user->id) {
            return redirect()->route('register.create');
        }

        return view('users.show');
    }
}
