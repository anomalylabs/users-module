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

    protected $activations;

    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * Handle the command.
     *
     * @param CompleteActivationCommand $command
     */
    public function handle(CompleteActivationCommand $command)
    {
        $this->activations->complete($command->getUser(), $command->getCode());
    }
}
 