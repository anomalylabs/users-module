<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class UsersStreamInstaller extends StreamInstaller
{

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'          => [],
        'username'       => [],
        'password'       => [],
        'permissions'    => [],
        'first_name'     => [],
        'last_name'      => [],
        'last_action_at' => [],
        'last_login_at'  => [],
    ];

}
 