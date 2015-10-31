<?php

return [
    [
        'tabs' => [
            'registration'   => [
                'title'  => 'Registration',
                'fields' => [
                    'register_enabled',
                    'activation_mode',
                    'register_path',
                    'activate_path',
                    'register_redirect',
                    'activated_redirect'
                ]
            ],
            'login'          => [
                'title'  => 'Login',
                'fields' => [
                    'login_enabled',
                    'login_path',
                    'login_redirect',
                    'logout_path',
                    'logout_redirect'
                ]
            ],
            'password_reset' => [
                'title'  => 'Password Resets',
                'fields' => [
                    'resets_enabled',
                    'reset_path',
                    'reset_redirect',
                    'complete_reset_path',
                    'complete_reset_redirect'
                ]
            ]
        ]
    ]
];
