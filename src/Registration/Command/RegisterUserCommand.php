<?php namespace Anomaly\Streams\Addon\Module\Users\Registration\Command;

class RegisterUserCommand
{
    protected $credentials;

    function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return mixed
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}
 