<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Anomaly\UsersModule\Activation\Contract\ActivationInterface;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\Suspension\Contract\SuspensionInterface;
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
        'roles',
        'activation',
        'suspension'
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
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

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
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        $roles = $this->getRoles();

        if ($roles instanceof EloquentCollection) {
            $roles = $roles->lists('slug');
        }

        return (in_array($role, $roles->all()));
    }

    /**
     * Return whether a user is in
     * any of the provided roles.
     *
     * @param array $role
     * @return bool
     */
    public function hasAnyRole(array $roles)
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
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

        if (array_get($this->getPermissions(), $permission) === true) {
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
     * Merge provided permissions onto existing ones.
     *
     * @param array $permissions
     * @return $this
     */
    public function mergePermissions(array $permissions)
    {
        $this->permissions = array_merge($this->getPermissions(), $permissions);

        return $this;
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
        return !$this->hasRole('admin');
    }

    /**
     * Get the related activation.
     *
     * @return null|ActivationInterface
     */
    public function getActivation()
    {
        return $this->activation;
    }

    /**
     * Return whether the user has a
     * completed activation or not.
     *
     * @return bool
     */
    public function isActivated()
    {
        $activation = $this->getActivation();

        return $activation ? $activation->isCompleted() : false;
    }

    /**
     * Return the activation relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activation()
    {
        return $this->hasOne('Anomaly\UsersModule\Activation\ActivationModel', 'user_id');
    }

    /**
     * Get the related suspension.
     *
     * @return null|SuspensionInterface
     */
    public function getSuspension()
    {
        return $this->suspension;
    }

    /**
     * Return whether the user is
     * suspended or not.
     *
     * @return bool
     */
    public function isSuspended()
    {
        $suspension = $this->getSuspension();

        return !is_null($suspension);
    }

    /**
     * Return the suspension relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suspension()
    {
        return $this->hasOne('Anomaly\UsersModule\Suspension\SuspensionModel', 'user_id');
    }
}
