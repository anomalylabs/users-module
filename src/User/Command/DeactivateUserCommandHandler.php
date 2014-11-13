<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class DeactivateUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class DeactivateUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param DeactivateUserCommand         $command
     * @param ActivationRepositoryInterface $activations
     */
    public function handle(DeactivateUserCommand $command, ActivationRepositoryInterface $activations)
    {
        $activations->delete($command->getUser());
    }
}
 