<?php namespace Anomaly\UsersModule\Role\Event;

use Anomaly\UsersModule\Role\Contract\Role;

/**
 * Class RoleWasCreated
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Event
 */
class RoleWasCreated
{

    /**
     * The role object.
     *
     * @var Role
     */
    protected $role;

    /**
     * Create a new RoleWasCreated instance.
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
