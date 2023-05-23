<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            ! $request->user() ||
            is_null($request->user()->primaryEmail->email_verified_at)
        ) {
            return $request->expectsJson()
                ? abort(403, trans('Your email address is not verified.'))
                : Redirect::guest(URL::route('verification.notice'));
        }

        return $next($request);
    }
}
