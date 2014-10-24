<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Event;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;

class ActivationWasCompletedEvent
{
    protected $activation;

    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    /**
     * @return mixed
     */
    public function getActivation()
    {
        return $this->activation;
    }
}
 