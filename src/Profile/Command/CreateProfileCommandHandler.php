<?php namespace Anomaly\Streams\Addon\Module\Users\Profile\Command;

use Anomaly\Streams\Addon\Module\Users\Profile\Contract\ProfileRepositoryInterface;

/**
 * Class CreateProfileCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Profile\Command
 */
class CreateProfileCommandHandler
{

    /**
     * Handle the command.
     *
     * @param CreateProfileCommand       $command
     * @param ProfileRepositoryInterface $profiles
     */
    public function handle(CreateProfileCommand $command, ProfileRepositoryInterface $profiles)
    {
        return $profiles->create($command->getUser());
    }
}
 