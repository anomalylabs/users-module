<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Laracasts\Commander\CommanderTrait;

class UserManager
{

    use CommanderTrait;

    public function create(array $credentials, $activate = false)
    {
        $user = $this->execute('Anomaly\Streams\Addon\Module\Users\User\Command\CreateUserCommand', $credentials);

        return $user;
    }
}
 