<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsersCreateResetsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsersCreateResetsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'resets',
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
        ],
        'code' => [
            'required' => true,
            'unique'   => true
        ]
    ];

}
