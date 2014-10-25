<?php namespace Anomaly\Streams\Addon\Module\Users\Login\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

class LogoutUserCommand
{
    protected $user;

    function __construct(UserInterface $user = null)
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
 