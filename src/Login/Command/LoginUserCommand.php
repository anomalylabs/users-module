<?php namespace Anomaly\Streams\Addon\Module\Users\Login\Command;

class LoginUserCommand
{
    protected $userId;

    protected $remember;

    function __construct($userId, $remember)
    {
        $this->userId   = $userId;
        $this->remember = $remember;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getRemember()
    {
        return $this->remember;
    }
}
 