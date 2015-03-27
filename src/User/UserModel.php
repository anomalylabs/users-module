<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\EloquentCollection;
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
     * Get the email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the activated flag.
     *
     * @return bool
     */
    public function isActivated()
    {
        return $this->activated;
    }

    /**
     * Get the blocked flag.
     *
     * @return bool
     */
    public function isBlocked()
    {
        return $this->blocked;
    }

    /**
     * Get related roles.
     *
     * @return EntryCollection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Return whether a user is in a role.
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        $roles = $this->getRoles();

        if ($roles instanceof EloquentCollection) {
            $roles = $roles->lists('slug');
        }

        return (in_array($role, $roles));
    }

    /**
     * Get the permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Return whether a user or it's roles has a permission.
     *
     * @param      $permission
     * @param bool $checkRoles
     * @return mixed
     */
    public function hasPermission($permission, $checkRoles = true)
    {
        if (!$permission) {
            return true;
        }

        if (in_array($permission, $this->getPermissions())) {
            return true;
        }

        if ($checkRoles) {

            /* @var RoleInterface $role */
            foreach ($this->getRoles() as $role) {
                if ($role->hasPermission($permission) || $role->getSlug() === 'admin') {
                    return true;
                }
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

    /**
     * Hash the password whenever setting it.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }
}
