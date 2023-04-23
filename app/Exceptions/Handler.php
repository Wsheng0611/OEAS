<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * 
     * Handle an unauthenticated user to access protected page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     * 
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // If the request expects a JSON response, return an error message
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        // Redirect all routes to the login page
        return redirect()->guest(route('login'));
    }
}