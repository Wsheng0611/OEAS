<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * 
 * Automatically trims leading and trailing whitespace from all
 * Example: " John " --> "John"
 * 
 */
class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     * @var array<int, string>
     * 
     */
    protected $except = [
        'password',
        // 'password_confirmation',
        // 'current_password',
    ];
}
