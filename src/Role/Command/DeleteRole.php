<?php namespace Anomaly\UsersModule\Role\Command;

use Anomaly\UsersModule\Role\Contract\Role;

/**
 * Class DeleteRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Command
 */
class DeleteRole
{

    /**
     * The role object.
     *
     * @var Role
     */
    protected $role;

    /**
     * Create a new DeleteRole instance.
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
