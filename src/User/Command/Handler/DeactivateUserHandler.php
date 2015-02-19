<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\DeactivateUser;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\UserWasDeactivated;
use Illuminate\Events\Dispatcher;

/**
 * Class DeactivateUserHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class DeactivateUserHandler
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
     * Create a new DeactivateUserHandler instance.
     *
     * @param UserRepositoryInterface $users
     * @param Dispatcher              $events
     */
    public function __construct(UserRepositoryInterface $users, Dispatcher $events)
    {
        $this->users  = $users;
        $this->events = $events;
    }

    /**
     * Handle the command.
     *
     * @param DeactivateUser $command
     */
    public function handle(DeactivateUser $command)
    {
        $this->events->fire(new UserWasDeactivated($this->users->deactivate($command->getUser())));
    }
}
