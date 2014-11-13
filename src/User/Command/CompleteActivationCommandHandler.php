<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class CompleteActivationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class CompleteActivationCommandHandler
{

    /**
     * Handle the command.
     *
     * @param CompleteActivationCommand     $command
     * @param ActivationRepositoryInterface $activations
     */
    public function handle(CompleteActivationCommand $command, ActivationRepositoryInterface $activations)
    {
        $activations->complete($command->getUser(), $command->getCode());
    }
}
 