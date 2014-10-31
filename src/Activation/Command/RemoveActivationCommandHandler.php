<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class RemoveActivationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class RemoveActivationCommandHandler
{

    /**
     * The activation repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Create a new RemoveActivationCommandHandler instance.
     *
     * @param ActivationRepositoryInterface $activations
     */
    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * Handle the command.
     *
     * @param RemoveActivationCommand $command
     */
    public function handle(RemoveActivationCommand $command)
    {
        $this->activations->removeActivation($command->getUserId());
    }
}
 