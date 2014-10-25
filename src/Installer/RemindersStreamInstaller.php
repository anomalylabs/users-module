<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class RemindersStreamInstaller extends StreamInstaller
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
        'user'         => [],
        'code'         => [],
        'is_complete' => [],
        'completed_at' => [],
    ];
}
 