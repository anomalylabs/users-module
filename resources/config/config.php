<?php

return [

    /**
     * User management configuration.
     */
    'users' => [
        'model'      => 'Anomaly\UsersModule\User\UserModel',
        'repository' => 'Anomaly\UsersModule\User\UserRepository',
    ],
    /**
     * Role management configuration.
     */
    'roles' => [
        'model'      => 'Anomaly\UsersModule\Role\RoleModel',
        'repository' => 'Anomaly\UsersModule\Role\RoleRepository',
    ],
];