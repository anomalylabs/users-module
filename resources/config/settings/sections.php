<?php

return [
    [
        'tabs' => [
            'registration'   => [
                'title'  => 'Registration',
                'fields' => [
                    'register_enabled',
                    'register_path',
                    'register_message',
                    'register_redirect',
                    'activation_mode',
                    'activate_path',
                    'activated_message',
                    'activated_redirect'
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
                    'resets_enabled',
                    'reset_path',
                    'reset_message',
                    'reset_redirect',
                    'complete_reset_path',
                    'complete_reset_message',
                    'complete_reset_redirect'
                ]
            ]
        ]
    ]
];
