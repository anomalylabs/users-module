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

    protected $profiles;

    function __construct(ProfileRepositoryInterface $profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * Handle the command.
     *
     * @param CreateProfileCommand $command
     */
    public function handle(CreateProfileCommand $command)
    {
        return $this->profiles->create($command->getUser());
    }
}
 