<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\User\Contract\User;

/**
 * Class AttachRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class AttachRole
{

    /**
     * The user object.
     *
     * @var User
     */
    protected $user;

    /**
     * The role object.
     *
     * @var Role
     */
    protected $role;

    /**
     * Create a new AttachRole instance.
     *
     * @param User $user
     * @param Role $role
     */
    function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Get the role.
     *
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
