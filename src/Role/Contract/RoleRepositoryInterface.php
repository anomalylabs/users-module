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
 