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
     * The module nav group.
     *
     * @var string
     */
    protected $nav = 'nav.system';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'users' => [
            'url'     => 'admin/users',
            'buttons' => [
                'create' => []
            ]
        ],
        'roles' => [
            'url'     => 'admin/users/roles',
            'buttons' => [
                'create' => []
            ]
        ]
    ];

    /**
     * The module menu.
     *
     * @var array
     */
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
