<?php namespace Anomaly\UsersModule\User\Authenticator\Contract;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Interface AuthenticatorExtensionInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Authenticator
 */
interface AuthenticatorExtensionInterface
{

    /**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
     */
    public function authenticate(array $credentials);
}
