<?php namespace Anomaly\UsersModule\Role;

use Anomaly\UsersModule\Role\Command\CreateRole;
use Anomaly\UsersModule\Role\Command\DeleteRole;
use Anomaly\UsersModule\Role\Contract\Role;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class RoleManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role
 */
class RoleManager
{

    use DispatchesCommands;

    /**
     * Create a new Role.
     *
     * @param array $attributes
     * @return Role
     */
    public function create(array $attributes)
    {
        return $this->dispatch(new CreateRole($attributes));
    }

    /**
     * Delete a role.
     *
     * @param Role $role
     */
    public function delete(Role $role)
    {
        $this->dispatch(new DeleteRole($role));
    }
}
