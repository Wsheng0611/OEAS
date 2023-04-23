<?php

return [

    /**
     * 
     * ------------------------------------------
     * Default Authentication Configuration
     * ------------------------------------------
     * - If no specific guard or provider is defined, the default configuration will be used
     * - For example, calling "Auth::user()" method, will trigger below setting
     * 
     */
    'defaults' => [
        'guard' => 'web', // web user
        'passwords' => 'users', // refer to "users" table in DB
    ],

    /**
     * 
     * ------------------------------------------
     * Guards Authentication Configuration
     * ------------------------------------------
     * - used to authenticate user credentials
     * 
     */
    'guards' => [
        // for default authentication
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        /*
        |
        | These guards are used to authenticate users
        | by checking credentials in either 'users' or 'admins' table
        |
        */
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    /**
     * 
     * ------------------------------------------
     * Providers Authentication Configuration
     * ------------------------------------------
     * - used to specify data retrieval mechanism for authenticated users via Model
     * - data retrieval mechanism = eloquent / database
     * 
     */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
