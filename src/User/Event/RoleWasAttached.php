<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class RoleWasAttached
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Event
 */
class RoleWasAttached
{

    /**
     * The user object.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The role object.
     *
     * @var Role
     */
    protected $role;

    /**
     * Create a new RoleWasAttached instance.
     *
     * @param UserInterface $user
     * @param Role $role
     */
    public function __construct(UserInterface $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Get the user.
     *
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the role.
     *
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }
}
