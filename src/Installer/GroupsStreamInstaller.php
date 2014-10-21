<?php namespace Anomaly\Streams\Module\Users\Installer;

use Streams\Core\Stream\Installer\StreamInstaller;

class GroupsStreamInstaller extends StreamInstaller
{
    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'        => ['is_required' => true, 'is_unique' => true],
        'permissions' => [],
    ];
}
