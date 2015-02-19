<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\UnblockUser;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\UserWasUnblocked;
use Illuminate\Events\Dispatcher;

/**
 * Class UnblockUserHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class UnblockUserHandler
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
     * Create a new UnblockUserHandler instance.
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
     * @param UnblockUser $command
     */
    public function handle(UnblockUser $command)
    {
        $this->events->fire(new UserWasUnblocked($this->users->unblock($command->getUser())));
    }
}
