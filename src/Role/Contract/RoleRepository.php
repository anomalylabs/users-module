<?php namespace Anomaly\UsersModule\Role\Contract;

use Illuminate\Support\Collection;

/**
 * Interface RoleRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Contract
 */
interface RoleRepository
{

    /**
     * Return all roles.
     *
     * @return Collection
     */
    public function all();

    /**
     * Create a new role.
     *
     * @param array $attributes
     * @return Role
     */
    public function create(array $attributes);

    /**
     * Delete a role.
     *
     * @param Role $role
     * @return Role
     */
    public function delete(Role $role);

    /**
     * Find a role.
     *
     * @param $id
     * @return null|Role
     */
    public function find($id);

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return null|Role
     */
    public function findBySlug($slug);

    /**
     * Update permissions for a role.
     *
     * @param Role  $role
     * @param array $permissions
     * @return Role
     */
    public function updatePermissions(Role $role, array $permissions);
}
