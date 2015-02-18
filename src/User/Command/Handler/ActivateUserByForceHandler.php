<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\ActivateUserByForce;
use Anomaly\UsersModule\User\Contract\UserRepository;

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
     * @var UserRepository
     */
    protected $user;

    /**
     * Create a new ActivateUserByForce instance.
     *
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param ActivateUserByForce $command
     * @return \Anomaly\UsersModule\User\Contract\User
     */
    public function handle(ActivateUserByForce $command)
    {
        $user = $command->getUser();

        $this->users->activate($user->getId());

        return $user;
    }
}
