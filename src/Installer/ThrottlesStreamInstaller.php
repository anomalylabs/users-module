<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class ThrottlesStreamInstaller extends StreamInstaller
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'is_hidden' => true,
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'user'       => [],
        'type'       => [],
        'ip_address' => [],
    ];
}
 