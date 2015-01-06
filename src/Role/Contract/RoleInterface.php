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
     * Get the role slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the role name.
     *
     * @return string
     */
    public function getName();
}
