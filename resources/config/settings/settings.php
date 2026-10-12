<?php

return [
    'login'                     => [
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
    'public_login'              => [
        'bind'   => 'anomaly.module.users::config.public_login',
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => true,
        ],
    ],
    'registration'              => [
        'bind'   => 'anomaly.module.users::config.registration',
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => true,
        ],
    ],
    'activation_mode'           => [
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
    'password_length'           => [
        'required' => true,
        'env'      => 'PASSWORD_LENGTH',
        'bind'     => 'anomaly.module.users::password.minimum_length',
        'type'     => 'anomaly.field_type.integer',
        'config'   => [
            'default_value' => 8,
            'min'           => 4,
        ],
    ],
    'password_requirements'     => [
        'bind'   => 'anomaly.module.users::password.requirements',
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'default_value' => [
                '[a-z]',
                '[A-Z]',
            ],
            'options'       => [
                '[0-9]'        => 'anomaly.module.users::setting.password_requirements.option.[0-9]',
                '[a-z]'        => 'anomaly.module.users::setting.password_requirements.option.[a-z]',
                '[A-Z]'        => 'anomaly.module.users::setting.password_requirements.option.[A-Z]',
                '[!@#$%^&*()]' => 'anomaly.module.users::setting.password_requirements.option.[!@#$%^&*()]',
            ],
        ],
    ],
    'two_factor_admin'          => [
        'required'    => true,
        'placeholder' => false,
        'bind'        => 'anomaly.module.users::two_factor.admin',
        'type'        => 'anomaly.field_type.select',
        'rules'       => [
            'two_factor_enrolled',
        ],
        'validators'  => [
            'two_factor_enrolled' => [
                'handler' => 'Anomaly\UsersModule\User\Validation\ValidateTwoFactorSetting@handle',
                'message' => 'anomaly.module.users::message.two_factor_enrol_first',
            ],
        ],
        'config'      => [
            'default_value' => 'off',
            'options'       => [
                'off'      => 'anomaly.module.users::setting.two_factor_admin.option.off',
                'optional' => 'anomaly.module.users::setting.two_factor_admin.option.optional',
                'required' => 'anomaly.module.users::setting.two_factor_admin.option.required',
            ],
        ],
    ],
    'two_factor_admin_methods'  => [
        'required' => true,
        'bind'     => 'anomaly.module.users::two_factor.admin_methods',
        'type'     => 'anomaly.field_type.checkboxes',
        'config'   => [
            'default_value' => [
                'authenticator',
                'email',
            ],
            'options'       => [
                'authenticator' => 'anomaly.module.users::setting.two_factor_admin_methods.option.authenticator',
                'email'         => 'anomaly.module.users::setting.two_factor_admin_methods.option.email',
            ],
        ],
    ],
    'new_user_notification'     => [
        'type'   => 'anomaly.field_type.tags',
        'bind'   => 'anomaly.module.users::notifications.new_user',
        'config' => [
            'filter_tags' => FILTER_VALIDATE_EMAIL,
        ],
    ],
    'pending_user_notification' => [
        'type'   => 'anomaly.field_type.tags',
        'bind'   => 'anomaly.module.users::notifications.pending_user',
        'config' => [
            'filter_tags' => FILTER_VALIDATE_EMAIL,
        ],
    ],
];
