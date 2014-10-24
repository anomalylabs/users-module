<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCompletedEvent;

class CompleteActivationCommandHandler
{
    use DispatchableTrait;

    protected $activation;

    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    public function handle(CompleteActivationCommand $command)
    {
        $activation = $this->activation->complete($command->getUserId(), $command->getCode());

        if ($activation) {

            $activation->raise(new ActivationWasCompletedEvent($activation));

            $this->dispatchEventsFor($activation);

        }

        return $activation ? : false;
    }
}
 