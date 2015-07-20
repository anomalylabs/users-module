<?php namespace Anomaly\UsersModule\Activation;

use Anomaly\UsersModule\Activation\Command\ActivateUserByCode;
use Anomaly\UsersModule\Activation\Command\ActivateUserByForce;
use Anomaly\UsersModule\Activation\Command\DeactivateUser;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ActivationManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation
 */
class ActivationManager
{

    use DispatchesJobs;

    /**
     * Activate a user by force.
     *
     * @param UserInterface $user
     */
    public function force(UserInterface $user)
    {
        $this->dispatch(new ActivateUserByForce($user));
    }

    /**
     * Activate a user by force.
     *
     * @param UserInterface $user
     * @param               $code
     * @return bool
     */
    public function activate(UserInterface $user, $code)
    {
        return $this->dispatch(new ActivateUserByCode($user, $code));
    }

    /**
     * Deactivate a user.
     *
     * @param UserInterface $user
     */
    public function deactivate(UserInterface $user)
    {
        $this->dispatch(new DeactivateUser($user));
    }
}
