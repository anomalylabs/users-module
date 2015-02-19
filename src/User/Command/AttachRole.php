<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\User\Contract\UserInterface;

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
     * @var UserInterface
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
     * @param UserInterface $user
     * @param Role $role
     */
    function __construct(UserInterface $user, Role $role)
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
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
