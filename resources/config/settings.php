<?php

return [
    'login'           => [
        'required'    => true,
        'placeholder' => false,
        'env'         => 'LOGIN',
        'bind'        => 'anomaly.module.users::config.login',
        'type'        => 'anomaly.field_type.select',
        'config'      => [
            'default_value' => 'email',
            'options'       => [
                'email'    => 'anomaly.module.users::setting.login.option.email',
                'username' => 'anomaly.module.users::setting.login.option.username',
            ],
        ],
    ],
    'activation_mode' => [
        'required'    => true,
        'placeholder' => false,
        'env'         => 'ACTIVATION_MODE',
        'bind'        => 'anomaly.module.users::config.activation_mode',
        'type'        => 'anomaly.field_type.select',
        'config'      => [
            'default_value' => 'email',
            'options'       => [
                'email'     => 'anomaly.module.users::setting.activation_mode.option.email',
                'manual'    => 'anomaly.module.users::setting.activation_mode.option.manual',
                'automatic' => 'anomaly.module.users::setting.activation_mode.option.automatic',
            ],
        ],
    ],
];
