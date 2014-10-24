<?php namespace Anomaly\Streams\Addon\Module\Users\Login\Command;

use Anomaly\Streams\Addon\Module\Users\User\UserInterface;

class LoginUserCommand
{
    protected $user;

    protected $remember;

    function __construct($user, $remember)
    {
        $this->user     = $user;
        $this->remember = $remember;
    }

    /**
     * @return \Anomaly\Streams\Addon\Module\Users\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
 