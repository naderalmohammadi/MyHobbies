<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class Lang {

    public function handle($request, Closure $next)
    {
        app()->setLocale(app('lang'));
        return $next($request);
    }

}
