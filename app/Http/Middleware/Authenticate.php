<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string[] $guards
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        //dd(auth()->guard('executant'));
        if (auth()->guard('executant')->user() || auth()->guard('customer')->user()) {
            return $next($request);
        }

        return redirect(route('public_login_form'));
    }
}
