<?php

return [
    'allow_registration'      => [
        'type' => 'anomaly.field_type.boolean'
    ],
    'register_path'           => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'register'
        ]
    ],
    'register_redirect'       => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => '/'
        ]
    ],
    'activated_redirect'      => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => '/'
        ]
    ],
    'activation_mode'         => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'manual',
            'options'       => [
                'manual'    => 'anomaly.module.users::setting.activation_mode.option.manual',
                'email'     => 'anomaly.module.users::setting.activation_mode.option.email',
                'automatic' => 'anomaly.module.users::setting.activation_mode.option.automatic'
            ]
        ]
    ],
    'profile_visibility'      => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'owner',
            'options'       => [
                'everyone' => 'anomaly.module.users::setting.profile_visibility.option.everyone',
                'disabled' => 'anomaly.module.users::setting.profile_visibility.option.disabled',
                'owner'    => 'anomaly.module.users::setting.profile_visibility.option.owner',
                'users'    => 'anomaly.module.users::setting.profile_visibility.option.users'
            ]
        ]
    ],
    'login_enabled'           => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => false
        ]
    ],
    'login_path'              => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'login'
        ]
    ],
    'login_message'           => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'anomaly.module.users::message.logged_in'
        ]
    ],
    'login_redirect'          => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => '/'
        ]
    ],
    'logout_path'             => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'logout'
        ]
    ],
    'logout_message'          => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'anomaly.module.users::message.logged_out'
        ]
    ],
    'logout_redirect'         => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => '/'
        ]
    ],
    'password_resets_enabled' => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => false
        ]
    ],
    'reset_path'              => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'reset'
        ]
    ],
    'complete_reset_path'     => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'reset/complete'
        ]
    ],
    'reset_redirect'          => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => '/'
        ]
    ],
    'complete_reset_redirect' => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => '/'
        ]
    ]
];
