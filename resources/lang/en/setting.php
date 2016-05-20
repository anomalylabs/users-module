<?php

return [
    'login'           => [
        'label'        => 'Login',
        'instructions' => 'How should users login?',
        'option'       => [
            'email'    => 'Email',
            'username' => 'Username'
        ]
    ],
    'activation_mode' => [
        'label'        => 'Activation Mode',
        'instructions' => 'How should users be activated after they register?',
        'option'       => [
            'email'     => 'Send an activation email to the user.',
            'manual'    => 'Require an administrator to manually activate the user.',
            'automatic' => 'Automatically activate the user after they register.'
        ]
    ]
];
