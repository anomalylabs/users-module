<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCompletedEvent;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\ActivationWasCreatedEvent;
use Anomaly\Streams\Platform\Support\Listener;

/**
 * Class ActivationListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation
 */
class ActivationListener extends Listener
{

    /**
     * Fire when an activation was created.
     *
     * @param ActivationWasCreatedEvent $event
     */
    public function whenActivationWasCreated(ActivationWasCreatedEvent $event)
    {
        // Now would be a good time to fire off those emails son.
    }

    /**
     * Fire when an activation is completed.
     *
     * @param ActivationWasCompletedEvent $event
     */
    public function whenActivationWasCompleted(ActivationWasCompletedEvent $event)
    {
        // Now would be a good time to fire off those emails son.
    }
}
 