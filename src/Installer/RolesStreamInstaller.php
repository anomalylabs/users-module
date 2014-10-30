<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class RolesStreamInstaller extends StreamInstaller
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
        'name'        => [],
        'slug'        => ['is_unique' => true],
        'permissions' => [],
    ];
}
 