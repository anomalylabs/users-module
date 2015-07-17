<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsers_100_CreateUsersStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsers_100_CreateUsersStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var string
     */
    protected $stream = [
        'slug'         => 'users',
        'title_column' => 'username'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'    => [
            'required' => true,
            'unique'   => true
        ],
        'username' => [
            'required' => true,
            'unique'   => true
        ],
        'password' => [
            'required' => true
        ],
        'roles'    => [
            'required' => true
        ],
        'activated',
        'activation_code',
        'blocked',
        'display_name',
        'first_name',
        'last_name',
        'last_login_at',
        'last_activity_at',
        'remember_token',
        'ip_address',
        'permissions',
        'website'
    ];

}
