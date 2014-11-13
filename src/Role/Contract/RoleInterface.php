<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Contract;

/**
 * Interface RoleInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role\Contract
 */
interface RoleInterface
{

    /**
     * Test if a role has access to the given permission(s)
     *
     * @param string|array $permissions
     * @param bool         $all
     * @return mixed
     */
    public function hasAccess($permissions, $all = true);

    /**
     * Get the role ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Get the role slug.
     *
     * @return mixed
     */
    public function getSlug();

    /**
     * Get related users having this role.
     *
     * @return mixed
     */
    public function getUsers();
}
 