<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

class CreateReminderCommand
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
 