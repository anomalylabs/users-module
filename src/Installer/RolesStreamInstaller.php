<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class RolesStreamInstaller extends StreamInstaller
{
    /**
     * Field assignments for the Roles stream.
     *
     * @var array
     */
    protected $assignments = [
        'name'        => [],
        'slug'        => ['is_unique' => true],
        'permissions' => [],
    ];
}
 