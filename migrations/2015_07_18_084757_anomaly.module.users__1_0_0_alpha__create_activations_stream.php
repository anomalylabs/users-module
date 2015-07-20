<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsers_1_0_0_alpha_CreateActivationsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsers_1_0_0_alpha_CreateActivationsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'activations',
        'title_column' => 'user'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'code' => [
            'unique' => true
        ],
        'user' => [
            'required' => true,
            'unique'   => true
        ],
        'completed'
    ];

}
