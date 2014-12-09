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

    protected $activations;

    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * Handle the command.
     *
     * @param ActivateUserCommand $command
     */
    public function handle(ActivateUserCommand $command)
    {
        $user = $command->getUser();

        $activation = $this->activations->create($user);

        $this->activations->complete($user, $activation->getCode());
    }
}
 