<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\Role\Contract\RoleRepository;
use Anomaly\UsersModule\User\Command\AttachRole;
use Anomaly\UsersModule\User\Contract\User;
use Anomaly\UsersModule\User\Contract\UserRepository;
use Anomaly\UsersModule\User\Event\RoleWasAttached;
use Illuminate\Events\Dispatcher;

/**
 * Class AttachRoleHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class AttachRoleHandler
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
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * Create a new AttachRoleHandler instance.
     *
     * @param UserRepository $users
     * @param RoleRepository $roles
     * @param Dispatcher     $events
     */
    public function __construct(UserRepository $users, RoleRepository $roles, Dispatcher $events)
    {
        $this->users  = $users;
        $this->roles  = $roles;
        $this->events = $events;
    }

    /**
     * Handle the command.
     *
     * @param AttachRole $command
     */
    public function handle(AttachRole $command)
    {
        $user = $command->getUser();
        $role = $command->getRole();

        $this->users->attachRole($user, $role);

        $this->events->fire(new RoleWasAttached($user, $role));
    }
}
