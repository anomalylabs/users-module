<?php namespace Anomaly\Streams\Addon\Module\Users\Role;

use Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleInterface;
use Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel;

/**
 * Class RoleModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role
 */
class RoleModel extends UsersRolesEntryModel implements RoleInterface
{

    /**
     * Test if a role has access to the given permission(s)
     *
     * @param string|array $permissions
     * @param bool         $all
     * @return mixed
     */
    public function hasAccess($permissions, $all = true)
    {
        // TODO: Implement hasAccess() method.
    }

    /**
     * Get the role slug.
     *
     * @return mixed
     */
    public function getSlug()
    {
        // TODO: Implement getSlug() method.
    }

    /**
     * Get related users having this role.
     *
     * @return mixed
     */
    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }
}
 