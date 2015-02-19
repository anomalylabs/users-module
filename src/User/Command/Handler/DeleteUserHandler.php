<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\DeleteUser;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\UserWasDeleted;
use Illuminate\Events\Dispatcher;

/**
 * Class DeleteUserHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class DeleteUserHandler
{

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * Create a new DeleteUserHandler instance.
     *
     * @param UserRepositoryInterface $users
     * @param Dispatcher     $events
     */
    public function __construct(UserRepositoryInterface $users, Dispatcher $events)
    {
        $this->users  = $users;
        $this->events = $events;
    }

    /**
     * Handle the command.
     *
     * @param DeleteUser $command
     */
    public function handle(DeleteUser $command)
    {
        $this->events->fire(new UserWasDeleted($this->users->delete($command->getUser())));
    }
}
