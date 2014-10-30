<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

class ForgetPersistenceCodesCommand
{

    protected $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
 