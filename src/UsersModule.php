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

    protected $nav = 'nav.system';

    protected $sections = [
        'users' => [
            'path' => 'admin/users',
        ],
        'roles' => [
            'path' => 'admin/users/roles',
        ]
    ];

    protected $menu = [
        'settings'    => [
            'title' => 'Settings',
            'path'  => 'admin/users/settings',
        ],
        'preferences' => [
            'title' => 'Preferences',
            'path'  => 'admin/users/preferences',
        ]
    ];
}
