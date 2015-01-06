<?php namespace Anomaly\UsersModule\User\Contract;

/**
 * Interface UserInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Contract
 */
interface UserInterface
{

    /**
     * Return whether a user is in a role(s).
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role);

    /**
     * Return whether a user has access to a permission(s).
     *
     * @param string|array $permission
     * @return bool
     */
    public function hasAccess($permission);
}
