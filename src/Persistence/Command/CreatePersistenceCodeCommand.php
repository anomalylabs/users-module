<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

class CreatePersistenceCodeCommand
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
 