<?php namespace Anomaly\UsersModule\Role\Command\Handler;

use Anomaly\UsersModule\Role\Command\DeleteRole;
use Anomaly\UsersModule\Role\Contract\RoleRepository;
use Anomaly\UsersModule\Role\Event\RoleWasDeleted;
use Illuminate\Events\Dispatcher;

/**
 * Class DeleteRoleHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Command\Handler
 */
class DeleteRoleHandler
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
     * @param DeleteRole $command
     */
    public function handle(DeleteRole $command)
    {
        $this->events->fire(new RoleWasDeleted($this->roles->delete($command->getRole())));
    }
}
