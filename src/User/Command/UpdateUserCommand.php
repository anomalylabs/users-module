<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

class UpdateUserCommand
{
    protected $userId;

    protected $credentials;

    protected $data;

    function __construct($userId, array $credentials = [], array $data = [])
    {
        $this->data        = $data;
        $this->userId      = $userId;
        $this->credentials = $credentials;
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
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
 