<?php namespace Anomaly\UsersModule\Role\Contract;

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
     * @return mixed
     */
    public function all();

    /**
     * Create a new Role.
     *
     * @param $name
     * @param $slug
     * @param $permissions
     * @return mixed
     */
    public function create($name, $slug, $permissions);
}
