<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class CreateActivationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class CreateActivationCommandHandler
{

    use DispatchableTrait;

    /**
     * The activation repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Create a new CreateActivationCommandHandler instance.
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
     * @param CreateActivationCommand $command
     */
    public function handle(CreateActivationCommand $command)
    {
        return $this->activations->createActivation($command->getUserId());
    }
}
 