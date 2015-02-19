<?php namespace Anomaly\UsersModule\Role\Command;

use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class DeleteRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface\Command
 */
class DeleteRole
{

    /**
     * The role object.
     *
     * @var RoleInterface
     */
    protected $role;

    /**
     * Create a new DeleteRole instance.
     *
     * @param RoleInterface $role
     */
    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    /**
     * Get the role.
     *
     * @return RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }
}
