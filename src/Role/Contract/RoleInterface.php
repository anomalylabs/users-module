<?php namespace Anomaly\UsersModule\Role\Contract;

/**
 * Interface RoleInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Contract
 */
interface RoleInterface
{

    /**
     * Get the role's slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the role's name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the role's permissions.
     *
     * @return array
     */
    public function getPermissions();

    /**
     * Return if a role as access to a the permission.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission);
}
