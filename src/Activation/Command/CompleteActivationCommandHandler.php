<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class CompleteActivationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class CompleteActivationCommandHandler
{

    use DispatchableTrait;

    /**
     * The activation repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Create a new ForceActivationCommandHandler instance.
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
     * @param CompleteActivationCommand $command
     * @return bool
     */
    public function handle(CompleteActivationCommand $command)
    {
        $this->activations->completeActivation($command->getUserId(), $command->getCode());
    }
}
 