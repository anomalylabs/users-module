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
    | Permissions
    |--------------------------------------------------------------------------
    |
    | Define additional permissions here.
    |
    */
    'permissions'     => [],
];
