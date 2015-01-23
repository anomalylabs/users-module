<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class UsersModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModule extends Module
{

    /**
     * The module navigation role.
     *
     * @var string
     */
    protected $navigation = 'streams::navigation.system';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'users' => [
            'buttons' => [
                'create'
            ]
        ],
        'roles' => [
            'buttons' => [
                'create'
            ]
        ],
        'permissions'
    ];

}
