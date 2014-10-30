<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization\Event;

class CheckAuthorizationPasses
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
 