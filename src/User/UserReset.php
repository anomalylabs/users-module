<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Command\StartPasswordReset;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UserReset
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserReset
{

    use DispatchesJobs;

    /**
     * Start a user reset process.
     *
     * @param UserInterface $user
     * @return bool
     */
    public function start(UserInterface $user)
    {
        return $this->dispatch(new StartPasswordReset($user));
    }

    /**
     * Complete a user'd password reset.
     *
     * @param UserInterface $user
     * @param               $code
     * @param               $password
     * @return bool
     */
    public function complete(UserInterface $user, $code, $password)
    {
        return true;
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function send(UserInterface $user)
    {
        return true;
    }
}
