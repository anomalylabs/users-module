<?php namespace Anomaly\UsersModule\Role;

use Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\User\UserCollection;

/**
 * Class RoleModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class RoleModel extends UsersRolesEntryModel implements RoleInterface
{

    /**
     * Eager loaded relations.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * Get the role slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the role name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the role's permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Return if a role as access to a the permission.
     *
     * @param  string $permission
     * @return mixed
     */
    public function hasPermission($permission)
    {
        if ($this->getSlug() == 'admin') {
            return true;
        }

        if (!$this->getPermissions()) {
            return false;
        }

        if (in_array($permission, $this->getPermissions())) {
            return true;
        }

        return false;
    }

    /**
     * Get the related users.
     *
     * @return UserCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Return the users relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany(
            'Anomaly\UsersModule\User\UserModel',
            'users_users_roles',
            'related_id',
            'entry_id'
        );
    }

    /**
     * Return if the model is deletable.
     *
     * @return bool
     */
    public function isDeletable()
    {
        return $this->getSlug() !== 'admin';
    }
}
