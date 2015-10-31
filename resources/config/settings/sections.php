<?php

return [
    [
        'tabs' => [
            'registration'   => [
                'title'  => 'Registration',
                'fields' => [
                    'allow_registration',
                    'activation_mode',
                    'register_path',
                    'register_redirect',
                    'activated_redirect',
                    'profile_visibility'
                ]
            ],
            'login'          => [
                'title'  => 'Login',
                'fields' => [
                    'login_enabled',
                    'login_path',
                    'login_message',
                    'login_redirect',
                    'logout_path',
                    'logout_message',
                    'logout_redirect'
                ]
            ],
            'password_reset' => [
                'title'  => 'Password Resets',
                'fields' => [
                    'password_resets_enabled',
                    'reset_path',
                    'complete_reset_path',
                    'reset_redirect',
                    'complete_reset_redirect'
                ]
            ]
        ]
    ]
];
