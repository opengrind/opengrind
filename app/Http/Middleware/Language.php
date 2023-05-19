<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class Language
{
    protected Application $app;

    protected Request $request;

    public function __construct(Application $app, Request $request)
    {
        $this->app = $app;
        $this->request = $request;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->app->setLocale(session('current_locale', config('app.locale')));

        return $next($request);
    }
}
