<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Platform\Support\Listener;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCreatedEvent;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCompletedEvent;

class ActivationListener extends Listener
{
    public function whenActivationWasCreated(ActivationWasCreatedEvent $event)
    {
        // Now would be a good time to fire off those emails son.
    }

    public function whenActivationWasCompleted(ActivationWasCompletedEvent $event)
    {
        // Now would be a good time to fire off those emails son.
    }
}
 