<?php namespace Anomaly\UsersModule\Role\Command\Handler;

use Anomaly\UsersModule\Role\Command\CreateRole;
use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\Role\Contract\RoleRepository;
use Anomaly\UsersModule\Role\Event\RoleWasCreated;
use Illuminate\Events\Dispatcher;

/**
 * Class CreateRoleHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Command\Handler
 */
class CreateRoleHandler
{

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
     * Create a new DeleteRoleHandler instance.
     *
     * @param RoleRepository $roles
     * @param Dispatcher     $events
     */
    function __construct(RoleRepository $roles, Dispatcher $events)
    {
        $this->roles  = $roles;
        $this->events = $events;
    }

    /**
     * Handle the command.
     *
     * @param CreateRole $command
     * @return Role
     */
    public function handle(CreateRole $command)
    {
        $role = $this->roles->create($command->getAttributes());

        $this->events->fire(new RoleWasCreated($role));

        return $role;
    }
}
