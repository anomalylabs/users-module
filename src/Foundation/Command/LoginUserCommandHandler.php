<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class LoginUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class LoginUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param LoginUserCommand               $command
     * @param UserRepositoryInterface        $users
     * @param PersistenceRepositoryInterface $persistences
     */
    public function handle(
        LoginUserCommand $command,
        UserRepositoryInterface $users,
        PersistenceRepositoryInterface $persistences
    ) {
        $user     = $command->getUser();
        $remember = $command->getRemember();

        $users->touchLogin($user);

        $persistences->persist($user, $remember);
    }
}
 