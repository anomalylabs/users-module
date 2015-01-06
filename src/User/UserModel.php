<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
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
     * Has the password whenever setting it.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }

    /**
     * Return whether a user is in a role(s).
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        return true;
    }

    /**
     * Return whether a user has permission(s).
     *
     * @param string|array $permission
     * @return bool
     */
    public function hasAccess($permission)
    {
        return true;
    }
}
