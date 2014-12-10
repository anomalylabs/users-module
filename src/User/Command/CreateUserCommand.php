<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

class CreateUserCommand
{

    protected $email;

    protected $username;

    protected $password;

    function __construct($email, $password, $username)
    {
        $this->email    = $email;
        $this->password = $password;
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
 