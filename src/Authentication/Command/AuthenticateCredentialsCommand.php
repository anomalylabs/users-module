<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

class AuthenticateCredentialsCommand
{
    protected $credentials;

    protected $remember;

    function __construct($credentials, $remember)
    {
        $this->remember    = $remember;
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
 