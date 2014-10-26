<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

class AuthenticateCredentialsCommand
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
 