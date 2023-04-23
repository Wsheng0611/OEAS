<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *
 * Redirects Authenticated User to the HomePage
 * when they try to access login or registration pages.
 * 
 */
class RedirectIfAuthenticated
{
     /**
      * 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * 
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // If guards is empty, set it to [null], otherwise keep the value of guards
        $guards = empty($guards) ? [null] : $guards;

        // Check if the user is authenticated for any of the given guards.
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect(RouteServiceProvider::ADMINHOME);
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }
        // If the user is not authenticated, allow them to access
        return $next($request);
    }
}
