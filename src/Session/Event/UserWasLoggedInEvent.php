<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Event;

class UserWasLoggedInEvent
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
 