<?php namespace Anomaly\UsersModule\Role;

use Anomaly\UsersModule\Role\Command\CreateRole;
use Anomaly\UsersModule\Role\Command\DeleteRole;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class RoleManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface
 */
class RoleManager
{

    use DispatchesCommands;

    /**
     * Create a new RoleInterface.
     *
     * @param array $attributes
     * @return RoleInterface
     */
    public function create(array $attributes)
    {
        return $this->dispatch(new CreateRole($attributes));
    }

    /**
     * Delete a role.
     *
     * @param RoleInterface $role
     */
    public function delete(RoleInterface $role)
    {
        $this->dispatch(new DeleteRole($role));
    }
}
