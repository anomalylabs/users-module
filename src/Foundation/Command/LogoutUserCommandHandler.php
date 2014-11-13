<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

/**
 * Class LogoutUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class LogoutUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param LogoutUserCommand              $command
     * @param PersistenceRepositoryInterface $persistences
     */
    public function handle(LogoutUserCommand $command, PersistenceRepositoryInterface $persistences)
    {
        $persistences->flush($command->getUser());

        if ($command->getForget()) {

            $persistences->forget();
        }
    }
}
 