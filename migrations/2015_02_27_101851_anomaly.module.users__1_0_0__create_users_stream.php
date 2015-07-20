<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsers_1_0_0_CreateUsersStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsers_1_0_0_CreateUsersStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var string
     */
    protected $stream = [
        'slug'         => 'users',
        'title_column' => 'display_name'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'        => [
            'required' => true,
            'unique'   => true
        ],
        'username'     => [
            'required' => true,
            'unique'   => true
        ],
        'password'     => [
            'required' => true
        ],
        'roles'        => [
            'required' => true
        ],
        'display_name' => [
            'required' => true
        ],
        'first_name'   => [
            'required' => true
        ],
        'last_name',
        'permissions',
        'remember_token',
        'last_login_at',
        'last_activity_at',
        'ip_address',
    ];

}
