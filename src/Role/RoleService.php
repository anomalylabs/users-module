<?php namespace Anomaly\Streams\Addon\Module\Users\Role;

use Anomaly\Streams\Addon\Module\Users\Role\Command\CreateRoleCommand;
use Anomaly\Streams\Addon\Module\Users\Role\Command\DeleteRoleCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class RoleService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role
 */
class RoleService
{

    use CommandableTrait;

    /**
     * Create a new role.
     *
     * @param       $name
     * @param       $slug
     * @param array $permissions
     * @return mixed
     */
    public function create($name, $slug, array $permissions = [])
    {
        return $this->execute(new CreateRoleCommand($name, $slug, $permissions));
    }

    /**
     * Delete a role.
     *
     * @param $slug
     * @return mixed
     */
    public function delete($slug)
    {
        return $this->execute(new DeleteRoleCommand($slug));
    }
}
 