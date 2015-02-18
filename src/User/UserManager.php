<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\User\Command\AttachRole;
use Anomaly\UsersModule\User\Command\DeleteUser;
use Anomaly\UsersModule\User\Contract\User;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class UserManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserManager
{

    use DispatchesCommands;

    /**
     * The user activator.
     *
     * @var UserActivator
     */
    protected $activator;

    /**
     * Create a new UserManager instance.
     *
     * @param UserActivator $activator
     */
    public function __construct(UserActivator $activator)
    {
        $this->activator = $activator;
    }

    /**
     * Create a new user.
     *
     * @param array $credentials
     * @return User
     */
    public function create(array $credentials, $activate = false)
    {
        $user = $this->dispatchFromArray('Anomaly\UsersModule\User\Command\CreateUser', compact('credentials'));

        if ($activate) {
            $this->activator->force($user);
        }

        return $user;
    }

    /**
     * Delete a user.
     *
     * @param User $user
     */
    public function delete(User $user)
    {
        $this->dispatch(new DeleteUser($user));
    }

    /**
     * Add a user to groups.
     *
     * @param User $user
     * @param Role $role
     */
    public function attachRole(User $user, Role $role)
    {
        $this->dispatch(new AttachRole($user, $role));
    }
}
