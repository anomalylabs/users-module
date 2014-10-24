<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class UsersStreamInstaller extends StreamInstaller
{
    /**
     * Field assignments for the Users stream.
     *
     * @var array
     */
    protected $assignments = [
        'email'            => [],
        'password'         => [],
        'permissions'      => [],
        'first_name'       => [],
        'last_name'        => [],
        'last_activity_at' => [],
    ];
}
 