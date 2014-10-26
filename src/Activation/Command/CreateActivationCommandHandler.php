<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCreatedEvent;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

class CreateActivationCommandHandler
{
    use DispatchableTrait;

    protected $repository;

    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CreateActivationCommand $command)
    {
        $activation = $this->repository->createActivation($command->getUserId());

        $activation->raise(new ActivationWasCreatedEvent($activation));

        $this->dispatchEventsFor($activation);

        return $activation ? : false;
    }
}
 