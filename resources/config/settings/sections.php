<?php

return [
    [
        'tabs' => [
            'security'      => [
                'title'  => 'anomaly.module.users::tab.security',
                'fields' => [
                    'login',
                    'public_login',
                    'registration',
                    'activation_mode',
                    'password_length',
                    'password_requirements',
                ],
            ],
            'two_factor'    => [
                'title'  => 'anomaly.module.users::tab.two_factor',
                'fields' => [
                    'two_factor_admin',
                    'two_factor_admin_methods',
                ],
            ],
            'notifications' => [
                'title'  => 'anomaly.module.users::tab.notifications',
                'fields' => [
                    'new_user_notification',
                    'pending_user_notification',
                ],
            ],
        ],
    ],
];
