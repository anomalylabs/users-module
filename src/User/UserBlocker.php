<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Command\BlockUser;
use Anomaly\UsersModule\User\Command\UnblockUser;
use Anomaly\UsersModule\User\Contract\User;
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
     * @param User $user
     */
    public function block(User $user)
    {
        $this->dispatch(new BlockUser($user));
    }

    /**
     * Unblock a user.
     *
     * @param User $user
     */
    public function unblock(User $user)
    {
        $this->dispatch(new UnblockUser($user));
    }
}
