<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\CreateAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = (new CreateAccount())->execute([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'username' => $request->input('username'),
        ]);

        auth()->login($user);

        return redirect()->route('verification.notice');
    }
}
