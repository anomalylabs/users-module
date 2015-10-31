<?php

return [
    'allow_registration'      => [
        'label'        => 'Allow Registration',
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
    'profile_visibility'      => [
        'label'        => 'Profile Visibility',
        'instructions' => 'Specify who can view user profiles on the public site.',
        'option'       => [
            'everyone' => 'Anyone can view public profiles.',
            'owner'    => 'Only the profile owner can view their profile.',
            'disabled' => 'Disable this feature.',
            'users'    => 'Any logged in user can view another user\'s public profile.'
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
    'login_message'           => [
        'label'        => 'Login Message',
        'instructions' => 'Specify the message to display to users after logging in.'
    ],
    'login_redirect'          => [
        'label'        => 'Login Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after logging in.'
    ],
    'logout_path'             => [
        'label'        => 'Logout Path',
        'instructions' => 'Specify the URL path to logout.'
    ],
    'logout_message'          => [
        'label'        => 'Logout Message',
        'instructions' => 'Specify the message to display to users after logging out.'
    ],
    'logout_redirect'         => [
        'label'        => 'Logout Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after logging out.'
    ],
    'password_resets_enabled' => [
        'label'        => 'Enable password resets?',
        'instructions' => 'Allow users to reset their password through the website?',
        'warning'      => 'This does not affect the control panel or plugin functionality.'
    ],
    'reset_path'              => [
        'label'        => 'Forgot Password Path',
        'instructions' => 'Specify the URL path for initiating a password reset.'
    ],
    'reset_redirect'          => [
        'label'        => 'Password Reset Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after successfully resetting their password.'
    ],
    'complete_reset_path'     => [
        'label'        => 'Password Reset Path',
        'instructions' => 'Specify the URL path to use for resetting passwords.'
    ],
    'complete_reset_redirect' => [
        'label'        => 'Password Reset Redirect',
        'instructions' => 'Specify the URL or URL path to redirect users after successfully resetting their password.'
    ]
];