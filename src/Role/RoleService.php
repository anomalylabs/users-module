<?php namespace Anomaly\Streams\Addon\Module\Users\Role;

use Laracasts\Commander\CommanderTrait;

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

    use CommanderTrait;

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
        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Role\Command\CreateRoleCommand',
            compact('name', 'slug', 'permissions')
        );
    }

    /**
     * Delete a role.
     *
     * @param $slug
     * @return mixed
     */
    public function delete($slug)
    {
        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Role\Command\DeleteRoleCommand',
            compact('slug')
        );
    }
}
 