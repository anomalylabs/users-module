<?php namespace Anomaly\Streams\Addon\Module\Users;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class UsersModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users
 */
class UsersModule extends Module
{

    /**
     * The module navigation role.
     *
     * @var string
     */
    protected $navigation = 'navigation.system';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'users'       => [
            'url'     => 'admin/users',
            'buttons' => [
                'create' => []
            ]
        ],
        'roles'       => [
            'url'     => 'admin/users/roles',
            'buttons' => [
                'create' => []
            ]
        ],
        'permissions' => [
            'url' => 'admin/users/permissions',
        ]
    ];
}
