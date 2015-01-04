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
    protected $stream = 'users';

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'            => ['is_required' => true, 'is_unique' => true],
        'username'         => ['is_required' => true, 'is_unique' => true],
        'password'         => ['is_required' => true],
        'activated'        => [],
        'activated_at'     => [],
        'activation_code'  => [],
        'blocked'          => [],
        'blocked_at'       => [],
        'last_login_at'    => [],
        'last_activity_at' => [],
        'remember_token'   => [],
        'ip_address'       => [],
        'roles'            => [],
    ];
}
