<?php namespace Anomaly\Streams\Addon\Module\Users\User\Event;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

class UserWasLoggedInEvent
{
    protected $user;

    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}
 