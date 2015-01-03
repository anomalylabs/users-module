<?php namespace Anomaly\UsersModule\Extension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class AuthenticatorExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Extension
 */
abstract class AuthenticatorExtension extends Extension
{

    /**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     */
    abstract public function authenticate(array $credentials);
}
 