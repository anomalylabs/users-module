<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Password\Command\ResetPassword;
use Anomaly\UsersModule\User\Password\Command\SendResetEmail;
use Anomaly\UsersModule\User\Password\Command\StartPasswordReset;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UserPassword
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UserPassword
{

    use DispatchesJobs;

    /**
     * Start a password reset.
     *
     * @param  UserInterface $user
     * @return bool
     */
    public function forgot(UserInterface $user)
    {
        return $this->dispatch(new StartPasswordReset($user));
    }

    /**
     * Reset a user's password.
     *
     * @param  UserInterface $user
     * @param                $code
     * @param                $password
     * @return bool
     */
    public function reset(UserInterface $user, $code, $password)
    {
        return $this->dispatch(new ResetPassword($user, $code, $password));
    }

    /**
     * @param  UserInterface $user
     * @param  string        $reset
     * @return bool
     */
    public function send(UserInterface $user, $reset = '/')
    {
        return $this->dispatch(new SendResetEmail($user, $reset));
    }
}
