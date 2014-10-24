<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

class CompleteReminderCommand
{
    protected $userId;

    protected $code;

    protected $password;

    function __construct($userId, $code, $password)
    {
        $this->code     = $code;
        $this->userId   = $userId;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
 