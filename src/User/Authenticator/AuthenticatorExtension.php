<?php namespace Anomaly\UsersModule\User\Authenticator;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\UsersModule\User\Authenticator\Contract\AuthenticatorExtensionInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class AuthenticatorExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Authenticator
 */
class AuthenticatorExtension extends Extension implements AuthenticatorExtensionInterface
{

    /**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
     */
    public function authenticate(array $credentials)
    {
        return null;
    }
}
