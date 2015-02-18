<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\DeleteUser;
use Anomaly\UsersModule\User\Contract\UserRepository;
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
     * @var UserRepository
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
     * @param UserRepository $users
     * @param Dispatcher     $events
     */
    public function __construct(UserRepository $users, Dispatcher $events)
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
        $user = $command->getUser();

        $this->users->delete($user);

        $this->events->fire(new UserWasDeleted($user));
    }
}
