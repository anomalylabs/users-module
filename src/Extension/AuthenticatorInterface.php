<?php namespace Anomaly\Streams\Addon\Module\Users\Extension;

/**
 * Interface AuthenticatorInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Extension
 */
interface AuthenticatorInterface
{

    /**
     * Return the authenticator handler.
     * The handler should have at least an
     * authenticate method.
     *
     * @return mixed
     */
    public function toHandler();
}
 