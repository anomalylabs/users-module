<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class AuthenticateCredentialsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class AuthenticateCredentialsCommandHandler
{

    /**
     * Handle the command.
     *
     * @param AuthenticateCredentialsCommand $command
     * @param UserRepositoryInterface        $repository
     * @return bool|mixed
     */
    public function handle(AuthenticateCredentialsCommand $command, UserRepositoryInterface $repository)
    {
        $user = $repository->findByCredentials($command->getCredentials());

        if (!$user instanceof UserInterface) {

            return false;
        }

        return $user;
    }
}
 