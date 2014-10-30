<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

class CheckPersistenceCodeCommand
{

    protected $userId;

    protected $code;

    function __construct($userId, $code)
    {
        $this->code   = $code;
        $this->userId = $userId;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
 