<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Login Field
    |--------------------------------------------------------------------------
    |
    | Specify whether to use the 'email' or 'username' for logging in.
    |
    */
    'login'           => env('LOGIN', 'email'),

    /*
    |--------------------------------------------------------------------------
    | Activation Mode
    |--------------------------------------------------------------------------
    |
    | How do you want to activate users? Available options are:
    |
    | 'email'       - Send an activation email to the user.
    | 'manual'      - Require an admin to manually activate the user.
    | 'automatic'   - Automatically activate the user when they register.
    |
    */
    'activation_mode' => env('ACTIVATION_MODE', 'email'),

    /*
    |--------------------------------------------------------------------------
    | Reset Throttling
    |--------------------------------------------------------------------------
    |
    | How many password reset requests may be made from an IP address, and
    | over how many seconds.
    |
    */
    'reset_attempts'  => env('RESET_ATTEMPTS', 5),
    'reset_decay'     => env('RESET_DECAY', 60),

    /*
    |--------------------------------------------------------------------------
    | Code Lifetimes
    |--------------------------------------------------------------------------
    |
    | How many minutes a password reset code and an activation code remain
    | valid for. A code carrying no expiry is treated as expired.
    |
    */
    'reset_code_ttl'      => 60,
    'activation_code_ttl' => 60 * 24 * 7,

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    |
    | Define additional permissions here.
    |
    */
    'permissions'     => [],
];
