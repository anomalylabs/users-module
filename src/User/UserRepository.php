<?php namespace Anomaly\Streams\Addon\Module\Users\User;

class UserRepository
{

    protected $users;

    function __construct(UserModel $users)
    {
        $this->users = $users;
    }
}
 