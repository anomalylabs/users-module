<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class CreateUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class CreateUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param CreateUserCommand       $command
     * @param UserRepositoryInterface $users
     * @return mixed
     */
    public function handle(CreateUserCommand $command, UserRepositoryInterface $users)
    {
        return $users->create($command->getCredentials());
    }
}
 