<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Contract;

/**
 * Interface RoleRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role\Contract
 */
interface RoleRepositoryInterface
{

    /**
     * Create a new role.
     *
     * @param       $name
     * @param       $slug
     * @param array $permissions
     * @return mixed
     */
    public function create($name, $slug, array $permissions = []);

    /**
     * Delete a role by it's slug.
     *
     * @param $slug
     * @return mixed
     */
    public function delete($slug);

    /**
     * Find a role by it's ID.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
 