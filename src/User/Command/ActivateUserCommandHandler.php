<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class ActivateUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class ActivateUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param ActivateUserCommand           $command
     * @param ActivationRepositoryInterface $activations
     */
    public function handle(ActivateUserCommand $command, ActivationRepositoryInterface $activations)
    {
        $user = $command->getUser();

        $activation = $activations->create($user);

        $activations->complete($user, $activation->getCode());
    }
}
 