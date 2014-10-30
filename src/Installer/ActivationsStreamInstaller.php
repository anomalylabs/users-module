<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class ActivationsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Installer
 */
class ActivationsStreamInstaller extends StreamInstaller
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
        'user'         => ['is_required' => true],
        'code'         => ['is_required' => true],
        'is_complete'  => [],
        'completed_at' => [],
    ];
}
 