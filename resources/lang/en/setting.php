<?php

return [
    'register_enabled'        => [
        'label'        => 'Registration Enabled',
        'instructions' => 'Allow users to register themselves through the website?',
        'warning'      => 'This does not affect the control panel or plugin functionality.'
    ],
    'register_path'           => [
        'label'        => 'Register Path',
        'instructions' => 'Specify the URL path to register.'
    ],
    'register_redirect'       => [
        'label'        => 'Register Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after successfully registering.'
    ],
    'activate_path'           => [
        'label'        => 'Activate Path',
        'instructions' => 'Specify the URL path to activate registered users.'
    ],
    'activated_redirect'      => [
        'label'        => 'Activated Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after completing registration.'
    ],
    'activation_mode'         => [
        'label'        => 'Activation Mode',
        'instructions' => 'How should users be activated after they register?',
        'option'       => [
            'manual'    => 'Require an administrator to manually activate the user.',
            'email'     => 'Send an activation confirmation email to the user.',
            'automatic' => 'Automatically activate the user after they register.'
        ]
    ],
    'login_enabled'           => [
        'label'        => 'Enable login?',
        'instructions' => 'Allow users to login through the website?',
        'warning'      => 'This does not affect the control panel or plugin functionality.'
    ],
    'login_path'              => [
        'label'        => 'Login Path',
        'instructions' => 'Specify the URL path to login.'
    ],
    'login_redirect'          => [
        'label'        => 'Login Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after logging in.'
    ],
    'logout_path'             => [
        'label'        => 'Logout Path',
        'instructions' => 'Specify the URL path to logout.'
    ],
    'logout_redirect'         => [
        'label'        => 'Logout Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after logging out.'
    ],
    'resets_enabled'          => [
        'label'        => 'Enable password resets?',
        'instructions' => 'Allow users to reset their password through the website?',
        'warning'      => 'This does not affect the control panel or plugin functionality.'
    ],
    'reset_path'              => [
        'label'        => 'Reset Password Path',
        'instructions' => 'Specify the URL path for initiating a password reset.'
    ],
    'reset_redirect'          => [
        'label'        => 'Reset Password Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after successfully resetting their password.'
    ],
    'complete_reset_path'     => [
        'label'        => 'Complete Reset Path',
        'instructions' => 'Specify the URL path to use for completing password resets.'
    ],
    'complete_reset_redirect' => [
        'label'        => 'Password Reset Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after successfully resetting their password.'
    ]
];