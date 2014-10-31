<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Addon\Module\Users\Activation\Event\UserWasActivatedEvent;
use Anomaly\Streams\Addon\Module\Users\Activation\Event\UserWasDeactivatedEvent;
use Anomaly\Streams\Platform\Support\Observer;

/**
 * Class ActivationModelObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation
 */
class ActivationModelObserver extends Observer
{

    /**
     * Fired when a user is activated.
     *
     * @param ActivationModel $activation
     */
    public function activated(ActivationModel $activation)
    {
        $this->dispatch(new UserWasActivatedEvent($activation->user_id));
    }

    /**
     * Fired when a user is deactivated.
     *
     * @param ActivationModel $activation
     */
    public function deactivated(ActivationModel $activation)
    {
        $this->dispatch(new UserWasDeactivatedEvent($activation->user_id));
    }
}
