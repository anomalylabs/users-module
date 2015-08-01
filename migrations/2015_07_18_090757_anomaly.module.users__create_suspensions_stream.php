<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsersCreateSuspensionsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsersCreateSuspensionsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'suspensions',
        'title_column' => 'user'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'user' => [
            'required' => true,
            'unique'   => true
        ]
    ];

}
