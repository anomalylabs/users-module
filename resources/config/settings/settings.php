<?php

return [
    'register_enabled'        => [
        'type' => 'anomaly.field_type.boolean'
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
    'register_path'           => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'register'
        ]
    ],
    'activate_path'           => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config'   => [
            'default_value' => 'register/activate'
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
