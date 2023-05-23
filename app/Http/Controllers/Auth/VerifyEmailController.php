<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $emailAddress = $request->user()->primaryEmail;

        if (! hash_equals((string) $emailAddress->id, (string) $request->route('id'))) {
            return redirect()->route('register.create');
        }

        if (! hash_equals(sha1($emailAddress->email), (string) $request->route('hash'))) {
            return redirect()->route('register.create');
        }

        if ($emailAddress->email_verified_at) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        $emailAddress->email_verified_at = now();
        $emailAddress->save();

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
