<?php namespace Anomaly\UsersModule\User;

use Illuminate\Foundation\Bus\DispatchesCommands;

class UserManager
{

    use DispatchesCommands;

    public function create(array $credentials)
    {
        $user = $this->dispatchFromArray('Anomaly\UsersModule\User\Command\CreateUserCommand', $credentials);

        return $user;
    }
}
