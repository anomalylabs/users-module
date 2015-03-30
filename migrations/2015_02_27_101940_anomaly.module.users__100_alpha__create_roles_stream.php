<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsers_100_alpha_CreateRolesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsers_100_alpha_CreateRolesStream extends Migration
{

    /**
     * The stream details.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'roles',
        'title_column' => 'name',
        'locked'       => true,
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => ['required' => true, 'translatable' => true],
        'slug' => ['required' => true, 'unique' => true],
        'permissions'
    ];

}
