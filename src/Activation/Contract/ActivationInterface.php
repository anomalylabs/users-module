<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Contract;

/**
 * Interface ActivationInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Contract
 */
interface ActivationInterface
{

    /**
     * Return is_complete flag.
     *
     * @return mixed
     */
    public function itIsComplete();
}
 