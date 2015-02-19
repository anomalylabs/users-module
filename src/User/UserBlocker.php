<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Command\BlockUser;
use Anomaly\UsersModule\User\Command\UnblockUser;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class UserBlocker
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserBlocker
{

    use DispatchesCommands;

    /**
     * Block a user.
     *
     * @param UserInterface $user
     */
    public function block(UserInterface $user)
    {
        $this->dispatch(new BlockUser($user));
    }

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     */
    public function unblock(UserInterface $user)
    {
        $this->dispatch(new UnblockUser($user));
    }
}
