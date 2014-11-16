<?php namespace Anomaly\Streams\Addon\Module\Users\Profile\Command;

use Anomaly\Streams\Addon\Module\Users\Profile\Contract\ProfileRepositoryInterface;

/**
 * Class DeleteProfileCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Profile\Command
 */
class DeleteProfileCommandHandler
{

    /**
     * Handle the command.
     *
     * @param DeleteProfileCommand       $command
     * @param ProfileRepositoryInterface $profiles
     */
    public function handle(DeleteProfileCommand $command, ProfileRepositoryInterface $profiles)
    {
        $profiles->delete($command->getUserId());
    }
}
 