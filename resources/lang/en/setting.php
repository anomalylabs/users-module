<?php

return [
    'allow_registration' => [
        'label'        => 'Allow Registration',
        'instructions' => 'Allow users to register themselves through the website?',
        'text'         => 'Yes, allow user registration'
    ],
    'activation_mode'    => [
        'label'        => 'Activation Mode',
        'instructions' => 'How should users be activated after they register?',
        'option'       => [
            'manual'    => 'MANUAL: Require an administrator to manually activate the user',
            'email'     => 'EMAIL: Send an activation confirmation email to the user',
            'automatic' => 'AUTOMATIC: Automatically activate the user after they register'
        ]
    ],
    'profile_visibility' => [
        'label'        => 'Profile Visibility',
        'instructions' => 'Specify who can view user profiles on the public site.',
        'option'       => [
            'everyone' => 'Anyone can view public profiles',
            'owner'    => 'Only the profile owner can view their profile',
            'disabled' => 'Disable this feature',
            'users'    => 'Any logged in user can view another user\'s public profile'
        ]
    ]
];