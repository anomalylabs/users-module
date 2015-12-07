<?php

return [
    'register_enabled' => [
        'type' => 'anomaly.field_type.boolean'
    ],
    'activation_mode'  => [
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
    'activation_roles' => [
        'required' => true,
        'type'     => 'anomaly.field_type.checkboxes',
        'config'   => [
            'options' => function (\Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface $roles) {

                $roles = $roles->allButAdmin();

                return array_combine(
                    array_map(
                        function (\Anomaly\UsersModule\Role\Contract\RoleInterface $role) {
                            return $role->getId();
                        },
                        $roles->all()
                    ),
                    array_map(
                        function (\Anomaly\UsersModule\Role\Contract\RoleInterface $role) {
                            return $role->getName();
                        },
                        $roles->all()
                    )
                );
            }
        ]
    ],
    'login_enabled'    => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => false
        ]
    ],
    'resets_enabled'   => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => false
        ]
    ]
];
