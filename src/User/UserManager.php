<?php namespace Anomaly\UsersModule\User;

use Laracasts\Commander\CommanderTrait;

class UserManager
{

    use CommanderTrait;

    public function create(array $credentials, $activate = false)
    {
        $user = $this->execute('Anomaly\UsersModule\User\Command\CreateUserCommand', $credentials);

        return $user;
    }
}
