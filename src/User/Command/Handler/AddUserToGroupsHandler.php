<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\Role\Contract\RoleRepository;
use Anomaly\UsersModule\User\Command\AddUserToGroups;
use Anomaly\UsersModule\User\Contract\UserRepository;

/**
 * Class AddUserToGroupsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class AddUserToGroupsHandler
{

    /**
     * The user repository.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * The role repository.
     *
     * @var RoleRepository
     */
    protected $roles;

    /**
     * Create a new AddUserToGroupsHandler instance.
     *
     * @param UserRepository                         $users
     * @param                RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Handle the command.
     *
     * @param AddUserToGroups $command
     */
    public function handle(AddUserToGroups $command)
    {
        $user  = $command->getUser();
        $roles = $command->getRoles();

        foreach ($roles as $slug) {
            if ($role = $this->roles->findBySlug($slug)) {
                $this->users->addUserToRole($user->getId(), $role->getId());
            }
        }
    }
}
