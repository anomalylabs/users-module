<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserActivator;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;

class HandleActivateRequest
{

    /**
     * Handle the command.
     *
     * @param  UserRepositoryInterface $users
     * @param UserAuthenticator        $authenticator
     * @param  UserActivator           $activator
     * @param  Encrypter               $encrypter
     * @param  Request                 $request
     * @return bool
     */
    public function handle(
        UserRepositoryInterface $users,
        UserAuthenticator $authenticator,
        UserActivator $activator,
        Encrypter $encrypter,
        Request $request
    ) {
        $code  = $request->get('code');
        $email = $request->get('email');

        if (!$code || !$email) {
            return false;
        }

        $code  = $encrypter->decrypt($code);
        $email = $encrypter->decrypt($email);

        if (!$user = $users->findByEmail($email)) {
            return false;
        }

        if ($activated = $activator->activate($user, $code)) {
            $authenticator->login($user);
        }

        return $activated;
    }
}
