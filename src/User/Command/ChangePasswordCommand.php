<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

class ChangePasswordCommand
{

    protected $userId;

    protected $password;

    function __construct($userId, $password)
    {
        $this->userId   = $userId;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}
 