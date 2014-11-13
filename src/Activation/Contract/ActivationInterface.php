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
     * Get the activation code.
     *
     * @return mixed
     */
    public function getCode();

    /**
     * Get the related user.
     *
     * @return mixed
     */
    public function getUser();

    /**
     * Return whether the activation is complete or not.
     *
     * @return mixed
     */
    public function isComplete();
}
 