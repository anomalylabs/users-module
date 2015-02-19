<?php namespace Anomaly\UsersModule\Authenticator;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class AuthenticatorExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Authenticator
 */
abstract class AuthenticatorExtension extends Extension
{

    /**
     * Authenticate credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
     */
    abstract public function authenticate(array $credentials);
}
