<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Command\ActivateUserByForce;
use Anomaly\UsersModule\User\Command\DeactivateUser;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class UserActivator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserActivator
{

    use DispatchesCommands;

    /**
     * Activate a user without a code.
     *
     * @param UserInterface $user
     */
    public function force(UserInterface $user)
    {
        $this->dispatch(new ActivateUserByForce($user));
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
