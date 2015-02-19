<?php namespace Anomaly\UsersModule\Role\Contract;

use Illuminate\Support\Collection;

/**
 * Interface RoleRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface\Contract
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
     * Create a new role.
     *
     * @param array $attributes
     * @return RoleInterface
     */
    public function create(array $attributes);

    /**
     * Delete a role.
     *
     * @param RoleInterface $role
     * @return RoleInterface
     */
    public function delete(RoleInterface $role);

    /**
     * Find a role.
     *
     * @param $id
     * @return null|RoleInterface
     */
    public function find($id);

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return null|RoleInterface
     */
    public function findBySlug($slug);

    /**
     * Update permissions for a role.
     *
     * @param RoleInterface $role
     * @param array         $permissions
     * @return RoleInterface
     */
    public function updatePermissions(RoleInterface $role, array $permissions);
}
