<?php

return [
    'login'                     => [
        'label'        => 'Login Field',
        'instructions' => 'Which field should be used for logging in?',
        'option'       => [
            'email'    => 'Email',
            'username' => 'Username',
        ],
    ],
    'public_login'              => [
        'label'        => 'Public Login',
        'instructions' => 'Should users be able to log in on the public site? The control panel login is always available, and only accepts users with control panel access while this is off.',
    ],
    'registration'              => [
        'label'        => 'Registration',
        'instructions' => 'Should visitors be able to register an account?',
    ],
    'activation_mode'           => [
        'label'        => 'Activation Mode',
        'instructions' => 'How should users be activated after they register?',
        'option'       => [
            'email'     => 'Send an activation email to the user.',
            'manual'    => 'Require an administrator to manually activate the user.',
            'automatic' => 'Automatically activate the user after they register.',
        ],
    ],
    'password_length'           => [
        'label'        => 'Password Length',
        'instructions' => 'Specify the minimum length for passwords.',
    ],
    'password_requirements'     => [
        'label'        => 'Password Requirements',
        'instructions' => 'Specify the character requirements for passwords.',
        'option'       => [
            '[0-9]'        => 'The password must contain at least one integer.',
            '[a-z]'        => 'The password must contain at least one lowercase letter.',
            '[A-Z]'        => 'The password must contain at least one uppercase letter.',
            '[!@#$%^&*()]' => 'The password must contain at least one special character.',
        ],
    ],
    'two_factor_admin'          => [
        'label'        => 'Control Panel Two-factor',
        'instructions' => 'Should users with control panel access be asked for a second factor when they sign in?',
        'warning'      => 'Required sends every control panel user, including those already signed in, to set up a method before they can continue.',
        'option'       => [
            'off'      => 'Off',
            'optional' => 'Optional: ask users who have set up a method.',
            'required' => 'Required: every control panel user must set up a method.',
        ],
    ],
    'two_factor_admin_methods'  => [
        'label'        => 'Control Panel Methods',
        'instructions' => 'Which methods may be used for the control panel? Untick email to require an authenticator app.',
        'option'       => [
            'authenticator' => 'Authenticator app',
            'email'         => 'Emailed code',
        ],
    ],
    'new_user_notification'     => [
        'name'         => 'New User Notification',
        'instructions' => 'Who should be notified of new users?',
    ],
    'pending_user_notification' => [
        'name'         => 'Pending User Notification',
        'instructions' => 'Who should be notified of users requiring activation?',
    ],
];
