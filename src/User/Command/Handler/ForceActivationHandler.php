<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\ForceActivation;
use Anomaly\UsersModule\User\Contract\UserRepository;

/**
 * Class ForceActivationHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class ForceActivationHandler
{

    /**
     * The user repository.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new ForceActivationHandler instance.
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
     * @param ForceActivation $command
     * @return \Anomaly\UsersModule\User\Contract\User
     */
    public function handle(ForceActivation $command)
    {
        $user = $command->getUser();

        $this->users->activate($user->getId());

        return $user;
    }
}
