<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class ProfilesStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Installer
 */
class ProfilesStreamInstaller extends StreamInstaller
{

    /**
     * The stream configuration.
     *
     * @var array
     */
    protected $stream = 'profiles';

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'user'         => [],
        'display_name' => [],
        'first_name'   => [],
        'last_name'    => [],
        'website'      => [],
    ];
}
 