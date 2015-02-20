<?php namespace Anomaly\UsersModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class UsersStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Installer
 */
class UsersStreamInstaller extends StreamInstaller
{

    /**
     * The stream configuration.
     *
     * @var string
     */
    protected $stream = [
        'slug'         => 'users',
        'title_column' => 'username',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'            => ['required' => true, 'unique' => true],
        'username'         => ['required' => true, 'unique' => true],
        'password'         => ['required' => true],
        'activated'        => [],
        'activation_code'  => [],
        'blocked'          => [],
        'display_name'     => [],
        'first_name'       => [],
        'last_name'        => [],
        'last_login_at'    => [],
        'last_activity_at' => [],
        'remember_token'   => [],
        'ip_address'       => [],
        'roles'            => [],
    ];

}
