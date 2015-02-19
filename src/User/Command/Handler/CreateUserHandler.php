<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\CreateUser;
use Anomaly\UsersModule\User\Contract\UserRepository;
use Anomaly\UsersModule\User\Event\UserWasCreated;
use Illuminate\Events\Dispatcher;

/**
 * Class CreateUserHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class CreateUserHandler
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
     * Create a new CreateUserHandler instance.
     *
     * @param UserRepository $users
     * @param Dispatcher     $events
     */
    function __construct(UserRepository $users, Dispatcher $events)
    {
        $this->users  = $users;
        $this->events = $events;
    }

    /**
     * Handle the command.
     *
     * @param CreateUser $command
     */
    public function handle(CreateUser $command)
    {
        $user = $this->users->create($command->getAttributes());

        $this->events->fire(new UserWasCreated($user));

        return $user;
    }
}
