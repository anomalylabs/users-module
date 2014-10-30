<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCompletedEvent;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

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
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new ForceActivationCommandHandler instance.
     *
     * @param ActivationRepositoryInterface $repository
     */
    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param CompleteActivationCommand $command
     * @return bool
     */
    public function handle(CompleteActivationCommand $command)
    {
        $activation = $this->repository->complete($command->getUserId(), $command->getCode());

        if ($activation) {

            $activation->raise(new ActivationWasCompletedEvent($activation));

            $this->dispatchEventsFor($activation);

        }

        return $activation;
    }

}
 