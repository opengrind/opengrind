<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->primaryEmail->email_verified_at) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        Mail::to($request->user()->primaryEmail)
            ->queue(new VerifyEmail($request->user()->primaryEmail));

        return back()->with('status', 'verification-link-sent');
    }
}
