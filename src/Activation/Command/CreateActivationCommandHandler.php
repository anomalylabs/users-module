<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCreatedEvent;

class CreateActivationCommandHandler
{
    use DispatchableTrait;

    protected $activation;

    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    public function handle(CreateActivationCommand $command)
    {
        $activation = $this->activation->createActivation($command->getUserId());

        $activation->raise(new ActivationWasCreatedEvent($activation));

        $this->dispatchEventsFor($activation);

        return $activation ? : false;
    }
}
 