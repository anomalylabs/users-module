<?php

return [

    /**
     * Session and Cookie keys. Leave as NULL to use an MD5 hash.
     */
    'session'         => null,
    'cookie'          => null,
    /**
     * User management configuration.
     */
    'users'           => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\User\UserModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\User\UserRepository',
    ],
    /**
     * Profile management configuration.
     */
    'profiles'        => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Profile\ProfileModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Profile\ProfileRepository',
    ],
    /**
     * Role management configuration.
     */
    'roles'           => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Role\RoleModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Role\RoleRepository',
    ],
    /**
     * Persistence management configuration.
     */
    'persistences'    => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceRepository',
    ],
    /**
     * Security checkpoints to run.
     */
    'security_checks' => [
        //'throttle',
        'blocked',
        'activation',
    ],
    /**
     * Activation management configuration.
     */
    'activations'     => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Activation\ActivationRepository',
        'expires'    => 259200,
        'lottery'    => [2, 100],
    ],
    /**
     * Block management configuration.
     */
    'blocks'          => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Block\BlockModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Block\BlockRepository',
    ],
    /**
     * Password reset management configuration.
     */
    'resets'          => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Reset\ResetModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Reset\ResetRepository',
        'expires'    => 14400, // 10 Days
        'lottery'    => [2, 100],
    ],
    /**
     * Throttle management configuration.
     */
    'throttling'      => [
        'model'      => 'Anomaly\Streams\Addon\Module\Users\Throttle\ThrottleModel',
        'repository' => 'Anomaly\Streams\Addon\Module\Users\Throttle\ThrottleRepository',
        'global'     => [
            'interval'   => 900, // 15 minutes
            'thresholds' => [
                10 => 1,
                20 => 2,
                30 => 4,
                40 => 8,
                50 => 16,
                60 => 12
            ],
        ],
        'ip'         => [
            'interval'   => 900, // 15 Minutes
            'thresholds' => 5,
        ],
        'user'       => [
            'interval'   => 900, // 15 Minutes
            'thresholds' => 5,
        ],
    ],
];