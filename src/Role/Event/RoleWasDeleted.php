<?php namespace Anomaly\UsersModule\Role\Event;

use Anomaly\UsersModule\Role\Contract\Role;

/**
 * Class RoleWasDeleted
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Event
 */
class RoleWasDeleted
{

    /**
     * The role object.
     *
     * @var Role
     */
    protected $role;

    /**
     * Create a new RoleWasDeleted instance.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
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
