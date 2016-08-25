<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;

/**
 * Class HandleActivateRequest
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class HandleActivateRequest
{

    /**
     * Handle the command.
     *
     * @param  UserRepositoryInterface $users
     * @param  UserActivator           $activator
     * @param  Encrypter               $encrypter
     * @param  Request                 $request
     * @return bool
     */
    public function handle(
        UserRepositoryInterface $users,
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

        return $activator->activate($user, $code);
    }
}
