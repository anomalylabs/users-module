<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

use Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundWithCredentialsException;
use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class AuthenticateCredentialsCommandHandler
{
    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(AuthenticateCredentialsCommand $command)
    {
        $credentials = $command->getCredentials();

        if (isset($credentials['email'])) {

            $login = $credentials['email'];

        } else {

            $login = $credentials['username'];

        }

        $user = $this->user->findByLoginAndPassword($login, $credentials['password']);

        if (!$user) {

            throw new UserNotFoundWithCredentialsException;

        }

        return $user;
    }
}
 