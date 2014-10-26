<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Command;

class LogoutUserCommand
{
    protected $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
 