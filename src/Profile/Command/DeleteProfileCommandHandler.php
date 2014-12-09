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

    protected $profiles;

    function __construct(ProfileRepositoryInterface $profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * Handle the command.
     *
     * @param DeleteProfileCommand $command
     */
    public function handle(DeleteProfileCommand $command)
    {
        $this->profiles->delete($command->getUserId());
    }
}
 