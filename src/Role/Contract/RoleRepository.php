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
     * Create a new Role.
     *
     * @param       $name
     * @param       $slug
     * @return Role
     */
    public function create($name, $slug);

    /**
     * Find a role by it's ID.
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|Role
     */
    public function find($id);

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return \Illuminate\Support\Collection|null|Role
     */
    public function findBySlug($slug);

    /**
     * Update permissions for a role.
     *
     * @param       $id
     * @param array $permissions
     * @return Role|Collection|null
     */
    public function updatePermissions($id, array $permissions);
}
