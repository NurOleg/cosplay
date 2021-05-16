<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use App\Models\Executant;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class PublicAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @param string[] $guards
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (auth()->user() instanceof Executant || auth()->user() instanceof Customer) {
            return $next($request);
        }

        return redirect(route('public_login_form'));
    }
}
