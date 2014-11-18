<?php namespace Anomaly\Streams\Addon\Module\Users\Extension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class AuthenticatorExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Extension
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
 