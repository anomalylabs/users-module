<?php namespace Anomaly\UsersModule\Role;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class RoleCollection
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class RoleCollection extends EntryCollection
{

    /**
     * Create a new RoleCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        /* @var RoleInterface $item */
        foreach ($items as $key => $item) {

            if ($item instanceof RoleInterface) {
                $key = $item->getSlug();
            }

            $this->items[$key] = $item;
        }
    }

    /**
     * Return all permissions.
     *
     * @return array
     */
    public function permissions()
    {
        return $this->map(
            function (RoleInterface $role) {
                return $role->getPermissions();
            }
        )->flatten()->all();
    }

    /**
     * Return if a role as access to a the permission.
     *
     * @param  string         $permission
     * @return RoleCollection
     */
    public function hasPermission($permission)
    {
        return $this->filter(
            function (RoleInterface $role) use ($permission) {
                return $role->hasPermission($permission);
            }
        );
    }
}
