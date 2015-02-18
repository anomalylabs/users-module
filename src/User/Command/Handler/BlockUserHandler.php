<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\BlockUser;
use Anomaly\UsersModule\User\Contract\UserRepository;
use Anomaly\UsersModule\User\Event\UserWasBlocked;
use Illuminate\Events\Dispatcher;

/**
 * Class BlockUserHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class BlockUserHandler
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
     * Create a new BlockUserHandler instance.
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
     * @param BlockUser $command
     */
    public function handle(BlockUser $command)
    {
        $this->events->fire(new UserWasBlocked($this->users->block($command->getUser())));
    }
}
