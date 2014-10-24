<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class FindUserByCredentialsCommandHandler
{
    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(FindUserByCredentialsCommand $command)
    {
        $credentials = $command->getCredentials();

        if (isset($credentials['email'])) {

            $login = $credentials['email'];

        } else {

            $login = $credentials['username'];

        }

        return $this->users->findByLoginAndPassword($login, $credentials['password']);
    }
}
 