<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class RolesStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Installer
 */
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
        'name'        => ['is_required' => true],
        'slug'        => ['is_unique' => true],
        'permissions' => [],
    ];
}
 