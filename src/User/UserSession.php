<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

class UserSession
{
    protected $user;

    public function login()
    {
        // TODO: Set the session.
    }

    public function logout()
    {
        // TODO: Clear the session.
    }

    /**
     * @param mixed $user
     * return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}
 