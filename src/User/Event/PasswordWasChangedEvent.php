<?php namespace Anomaly\Streams\Addon\Module\Users\User\Event;

use Symfony\Component\Security\Core\User\UserInterface;

class PasswordWasChangedEvent
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
 