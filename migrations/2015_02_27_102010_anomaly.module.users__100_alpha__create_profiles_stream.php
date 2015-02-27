<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsers_100_alpha_CreateProfilesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsers_100_alpha_CreateProfilesStream extends Migration
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
