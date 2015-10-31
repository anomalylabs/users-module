<?php

return [
    'register_enabled'        => [
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
    'activate_path'           => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'register/activate'
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
    'resets_enabled'          => [
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
