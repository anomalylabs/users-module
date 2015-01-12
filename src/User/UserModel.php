<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Auth\Authenticatable;

/**
 * Class UserModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserModel extends UsersUsersEntryModel implements UserInterface, \Illuminate\Contracts\Auth\Authenticatable
{

    use Authenticatable;

    /**
     * Hash the password whenever setting it.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }

    /**
     * Get related roles.
     *
     * @return EntryCollection
     */
    public function getRoles()
    {
        return $this->roles()->get();
    }

    /**
     * Return whether a user is in a role.
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        return (in_array($role, $this->roles()->lists('slug')));
    }

    /**
     * Return whether a user has permission.
     *
     * @param string|array $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if (!$permission) {
            return true;
        }
        
        foreach ($this->getRoles() as $role) {
            if ($role instanceof RoleInterface && $role->hasPermission($permission) || $role->getSlug() === 'admin') {
                return true;
            }
        }

        return false;
    }

    /**
     * Return whether a user has any of provided permission.
     *
     * @param $permissions
     * @return bool
     */
    public function hasAnyPermission(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }
}
