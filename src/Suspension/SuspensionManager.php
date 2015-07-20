<?php namespace Anomaly\UsersModule\Suspension;

use Anomaly\UsersModule\Suspension\Command\ReinstateUser;
use Anomaly\UsersModule\Suspension\Command\SuspendUser;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SuspensionManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Suspension
 */
class SuspensionManager
{

    use DispatchesJobs;

    /**
     * Suspend a user.
     *
     * @param UserInterface $user
     */
    public function suspend(UserInterface $user)
    {
        $this->dispatch(new SuspendUser($user));
    }

    /**
     * Reinstate a user.
     *
     * @param UserInterface $user
     */
    public function reinstate(UserInterface $user)
    {
        $this->dispatch(new ReinstateUser($user));
    }
}
