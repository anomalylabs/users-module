<?php namespace Anomaly\UsersModule\Role;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class RoleCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role
 */
class RoleCollection extends EntryCollection
{

    /**
     * Return all but the admin role.
     *
     * @return RoleCollection
     */
    public function notAdmin()
    {
        return $this->make(
            array_filter(
                $this->items,
                function (RoleInterface $role) {
                    return $role->getSlug() !== 'admin';
                }
            )
        );
    }
}
