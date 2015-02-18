<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\User;

class UserWasLoggedOut
{

    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
