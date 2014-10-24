<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class FlagsStreamInstaller extends StreamInstaller
{
    /**
     * Field assignments for the Flags stream.
     *
     * @var array
     */
    protected $assignments = [
        'flag_type'  => [],
        'is_flagged' => [],
    ];
}
 