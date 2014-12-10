<?php

return [

    /**
     * User management configuration.
     */
    'users' => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\User\UserModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\User\UserRepository',
    ],

    /**
     * Role management configuration.
     */
    'roles' => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Role\RoleModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Role\RoleRepository',
    ],
];