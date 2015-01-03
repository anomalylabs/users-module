<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\UserInterface;

class UserWasLoggedOut
{

    protected $user;

    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
 