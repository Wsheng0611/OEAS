<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

/**
 * The EncryptCookies middleware class.
 *
 * This middleware encrypts all cookies used by the application, except for
 * any specified in the $except property.
 *
 * @package App\Http\Middleware
 */
class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Add the name of any cookies that should not be encrypted
    ];
}
