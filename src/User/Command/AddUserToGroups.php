<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\User;

/**
 * Class AddUserToGroups
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class AddUserToGroups
{

    /**
     * The user object.
     *
     * @var User
     */
    protected $user;

    /**
     * The roles to join.
     *
     * @var array
     */
    protected $roles;

    /**
     * Create a new AddUserToGroups instance.
     *
     * @param User  $user
     * @param array $roles
     */
    function __construct(User $user, array $roles)
    {
        $this->user  = $user;
        $this->roles = $roles;
    }

    /**
     * Get the roles.
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
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
