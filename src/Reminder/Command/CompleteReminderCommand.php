<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

class CompleteReminderCommand
{
    protected $userId;

    protected $code;

    function __construct($userId, $code)
    {
        $this->code   = $code;
        $this->userId = $userId;
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
 