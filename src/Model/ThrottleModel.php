<?php namespace Streams\Addon\Module\Users\Model;

use Cartalyst\Sentry\Throttling\Eloquent\Throttle;

class ThrottleModel extends Throttle
{
    /**
     * Override the table used.
     * 
     * @var string
     */
    public $table = 'users_throttle';
}
