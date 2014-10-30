<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCreatedEvent;
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
     * The user repository interface.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CreateActivationCommandHandler instance.
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
     * @param CreateActivationCommand $command
     * @return bool
     */
    public function handle(CreateActivationCommand $command)
    {
        $activation = $this->repository->createActivation($command->getUserId());

        $activation->raise(new ActivationWasCreatedEvent($activation));

        $this->dispatchEventsFor($activation);

        return $activation ? : false;
    }
}
 