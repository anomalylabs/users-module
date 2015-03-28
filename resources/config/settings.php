<?php

return [
    'allow_registration' => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'text' => 'anomaly.module.users::setting.allow_registration.text'
        ]
    ],
    'activation_mode'    => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'manual'    => 'anomaly.module.users::setting.activation_mode.option.manual',
                'email'     => 'anomaly.module.users::setting.activation_mode.option.email',
                'automatic' => 'anomaly.module.users::setting.activation_mode.option.automatic'
            ]
        ]
    ],
    'profile_visibility' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'everyone' => 'anomaly.module.users::setting.profile_visibility.option.everyone',
                'owner'    => 'anomaly.module.users::setting.profile_visibility.option.owner',
                'disabled' => 'anomaly.module.users::setting.profile_visibility.option.disabled',
                'users'    => 'anomaly.module.users::setting.profile_visibility.option.users'
            ]
        ]
    ]
];
