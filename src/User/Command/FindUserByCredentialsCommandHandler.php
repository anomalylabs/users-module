<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class FindUserByCredentialsCommandHandler
{
    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(FindUserByCredentialsCommand $command)
    {
        $credentials = $command->getCredentials();

        if (isset($credentials['email'])) {

            $login = $credentials['email'];

        } else {

            $login = $credentials['username'];

        }

        return $this->user->findByLoginAndPassword($login, $credentials['password']);
    }
}
 