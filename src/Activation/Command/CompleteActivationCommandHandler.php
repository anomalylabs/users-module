<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCompletedEvent;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

class CompleteActivationCommandHandler
{
    use DispatchableTrait;

    protected $repository;

    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CompleteActivationCommand $command)
    {
        $activation = $this->repository->complete($command->getUserId(), $command->getCode());

        if ($activation) {

            $activation->raise(new ActivationWasCompletedEvent($activation));

            $this->dispatchEventsFor($activation);

        }

        return $activation ? : false;
    }
}
 