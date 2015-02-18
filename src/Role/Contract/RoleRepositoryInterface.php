<?php namespace Anomaly\UsersModule\Role\Contract;

use Illuminate\Support\Collection;

/**
 * Interface RoleRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Contract
 */
interface RoleRepositoryInterface
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
     * @return RoleInterface
     */
    public function create($name, $slug);

    /**
     * Find a role by it's ID.
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|RoleInterface
     */
    public function find($id);

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return \Illuminate\Support\Collection|null|RoleInterface
     */
    public function findBySlug($slug);

    /**
     * Update permissions for a role.
     *
     * @param       $id
     * @param array $permissions
     * @return RoleInterface|Collection|null
     */
    public function updatePermissions($id, array $permissions);
}
