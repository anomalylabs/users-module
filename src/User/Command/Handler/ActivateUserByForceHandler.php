<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\ActivateUserByForce;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\UserWasActivated;
use Illuminate\Events\Dispatcher;

/**
 * Class ActivateUserByForce
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class ActivateUserByForceHandler
{

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $user;

    /**
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * Create a new ActivateUserByForce instance.
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
     * @param ActivateUserByForce $command
     */
    public function handle(ActivateUserByForce $command)
    {
        $this->events->fire(new UserWasActivated($this->users->activate($command->getUser())));
    }
}
