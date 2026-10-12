<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsersAddTwoFactorToUsers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleUsersAddTwoFactorToUsers extends Migration
{

    /**
     * Don't delete the stream.
     * Used for reference only.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'two_factor_secret'             => 'anomaly.field_type.textarea',
        'two_factor_totp_confirmed_at'  => 'anomaly.field_type.datetime',
        'two_factor_email_confirmed_at' => 'anomaly.field_type.datetime',
        'two_factor_recovery_codes'     => 'anomaly.field_type.textarea',
        'two_factor_last_step'          => 'anomaly.field_type.integer',
    ];

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
        'two_factor_secret'             => [],
        'two_factor_totp_confirmed_at'  => [],
        'two_factor_email_confirmed_at' => [],
        'two_factor_recovery_codes'     => [],
        'two_factor_last_step'          => [],
    ];

}
