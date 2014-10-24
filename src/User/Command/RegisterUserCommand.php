<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

class RegisterUserCommand
{
    protected $email;

    protected $username;

    protected $password;

    protected $firstName;

    protected $lastName;

    protected $permissions;

    function __construct($email, $username, $password, $firstName = null, $lastName = null, $permissions = [])
    {
        $this->email       = $email;
        $this->password    = $password;
        $this->username    = $username;
        $this->lastName    = $lastName;
        $this->firstName   = $firstName;
        $this->permissions = $permissions;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}
 