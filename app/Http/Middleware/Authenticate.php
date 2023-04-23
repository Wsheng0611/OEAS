<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * 
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     * 
     */
    protected function redirectTo($request)
    {
        // Check if the request expects a JSON response
        if (!$request->expectsJson()) {
            // If not, redirect to the login page
            return route('login');
        }

        // If the request expects a JSON response, do not redirect
        return null;
    }
}
