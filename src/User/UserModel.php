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
     * The eager loaded relationships.
     *
     * @var array
     */
    protected $with = [
        'roles'
    ];

    /**
     * The hidden attributes.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

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
     * Get the display name.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the last name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the password.
     *
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
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
     * @param RoleInterface $role
     * @return bool
     */
    public function hasRole(RoleInterface $role)
    {
        if (!$role) {
            return true;
        }

        if ($this->isAdmin()) {
            return true;
        }

        /* @var RoleInterface $role */
        foreach ($roles = $this->getRoles() as $userRole) {
            if ($userRole->getId() === $role->getId()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return whether a user is in
     * any of the provided roles.
     *
     * @param EntryCollection $roles
     * @return bool
     */
    public function hasAnyRole(EntryCollection $roles)
    {
        if ($roles->isEmpty()) {
            return true;
        }

        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return whether the user
     * is an admin or not.
     *
     * @return bool
     */
    public function isAdmin()
    {
        /* @var RoleInterface $role */
        foreach ($roles = $this->getRoles() as $role) {
            if ($role->getSlug() === 'admin') {
                return true;
            }
        }

        return false;
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
     * Set the permissions.
     *
     * @param array $permissions
     * @return $this
     */
    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;

        return $this;
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

    /**
     * Return whether the model is deletable or not.
     *
     * @return bool
     */
    public function isDeletable()
    {
        // You can't delete yourself.
        if ($this->getId() == app('auth')->id()) {
            return false;
        }

        // Only admins can delete admins
        if (!app('auth')->user()->isAdmin() && $this->isAdmin()) {
            return false;
        }

        return true;
    }

    /**
     * Return the activated flag.
     *
     * @return bool
     */
    public function isActivated()
    {
        return $this->activated;
    }

    /**
     * Return the enabled flag.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Get the reset code.
     *
     * @return string
     */
    public function getResetCode()
    {
        return $this->reset_code;
    }

    /**
     * Set the reset code.
     *
     * @param $code
     * @return $this
     */
    public function setResetCode($code)
    {
        $this->reset_code = $code;

        return $this;
    }

    /**
     * Get the activation code.
     *
     * @return string
     */
    public function getActivationCode()
    {
        return $this->activation_code;
    }

    /**
     * Set the activation code.
     *
     * @param $code
     * @return $this
     */
    public function setActivationCode($code)
    {
        $this->activation_code = $code;

        return $this;
    }

    /**
     * Return the full name.
     *
     * @return string
     */
    public function name()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Attach a role to the user.
     *
     * @param RoleInterface $role
     */
    public function attachRole(RoleInterface $role)
    {
        $this->roles()->attach($role);
    }
}
