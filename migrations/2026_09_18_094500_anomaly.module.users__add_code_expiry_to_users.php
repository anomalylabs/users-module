<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsersAddCodeExpiryToUsers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleUsersAddCodeExpiryToUsers extends Migration
{

    /**
     * Don't delete the stream.
     * Used for reference only.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'users',
    ];

    /**
     * @var array
     */
    protected $assignments = [
        'reset_code_expires_at'      => [],
        'activation_code_expires_at' => [],
    ];

}
