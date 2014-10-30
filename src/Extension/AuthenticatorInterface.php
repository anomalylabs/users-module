<?php namespace Anomaly\Streams\Addon\Module\Users\Extension;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

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
     * Authenticate some credentials.
     *
     * @param array $credentials
     * @return UserInterface
     */
    public function authenticate(array $credentials);
}
 