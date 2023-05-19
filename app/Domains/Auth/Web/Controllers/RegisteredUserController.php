<?php

namespace App\Domains\Auth\Web\Controllers;

use App\Domains\Auth\Services\CreateAccount;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $user = (new CreateAccount())->execute([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
