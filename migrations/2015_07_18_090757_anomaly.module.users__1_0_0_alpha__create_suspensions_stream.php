<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsers_1_0_0_alpha_CreateSuspensionsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsers_1_0_0_alpha_CreateSuspensionsStream extends Migration
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
