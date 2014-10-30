<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

class FindUserByIdCommand
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
 