<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\User\Contract\User;

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
     * @var User
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
     * @param User $user
     * @param Role $role
     */
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Get the user.
     *
     * @return User
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
