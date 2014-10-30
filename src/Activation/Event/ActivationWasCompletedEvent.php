<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Event;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;

/**
 * Class ActivationWasCompletedEvent
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Event
 */
class ActivationWasCompletedEvent
{

    /**
     * The activation object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel
     */
    protected $activation;

    /**
     * Create a new ActivationWasCompletedEvent object.
     *
     * @param ActivationModel $activation
     */
    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    /**
     * Get the activation object.
     *
     * @return mixed
     */
    public function getActivation()
    {
        return $this->activation;
    }
}
 