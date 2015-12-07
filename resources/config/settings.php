<?php

return [
    'activation_mode' => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'manual',
            'options'       => [
                'email'     => 'anomaly.module.users::setting.activation_mode.option.email',
                'manual'    => 'anomaly.module.users::setting.activation_mode.option.manual',
                'automatic' => 'anomaly.module.users::setting.activation_mode.option.automatic'
            ]
        ]
    ]
];
