<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsersCreateUsersStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsersCreateUsersStream extends Migration
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
        'first_name',
        'last_name',
        'activated',
        'suspended',
        'avatar',
        'permissions',
        'last_login_at',
        'remember_token',
        'activation_code',
        'reset_code',
        'last_activity_at',
        'ip_address'
    ];

}
