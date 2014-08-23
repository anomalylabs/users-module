<?php namespace Streams\Addon\Module\Users\Model;

use Cartalyst\Sentry\Users\Eloquent\User;

class GroupModel extends User
{
    /**
     * Override the table used.
     * 
     * @var string
     */
    public $table = 'users_groups';
}
