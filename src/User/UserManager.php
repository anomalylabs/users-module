<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\User\Command\AttachRole;
use Anomaly\UsersModule\User\Command\CreateUser;
use Anomaly\UsersModule\User\Command\DeleteUser;
use Anomaly\UsersModule\User\Contract\UserInterface;
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
     * @var UserInterfaceActivator
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
     * @param array $attributes
     * @return UserInterface
     */
    public function create(array $attributes, $activate = false)
    {
        $user = $this->dispatch(new CreateUser($attributes));

        if ($activate) {
            $this->activator->force($user);
        }

        return $user;
    }

    /**
     * Delete a user.
     *
     * @param UserInterface $user
     */
    public function delete(UserInterface $user)
    {
        $this->dispatch(new DeleteUser($user));
    }

    /**
     * Add a user to groups.
     *
     * @param UserInterface $user
     * @param RoleInterface $role
     */
    public function attachRole(UserInterface $user, RoleInterface $role)
    {
        $this->dispatch(new AttachRole($user, $role));
    }
}
