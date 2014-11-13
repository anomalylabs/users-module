<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class UsersStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Installer
 */
class UsersStreamInstaller extends StreamInstaller
{

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'            => ['is_required' => true, 'is_unique' => true],
        'username'         => ['is_required' => true, 'is_unique' => true],
        'password'         => [],
        'last_login_at'    => [],
        'last_activity_at' => [],
        'ip_address'       => [],
        'roles'            => [],
    ];
}
 