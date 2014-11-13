<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class GetUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class GetUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param GetUserCommand          $command
     * @param UserRepositoryInterface $repository
     * @return mixed
     */
    public function handle(GetUserCommand $command, UserRepositoryInterface $repository)
    {
        return $repository->find($command->getUserId());
    }
}
 