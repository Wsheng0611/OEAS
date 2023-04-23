<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * 
 * - use to verify each incoming request has a valid CSRF token
 * - If token missing / invalid, request will be rejected
 * - If non-GET request and submit form request, will check
 * 
 */
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // nothing
    ];
}
