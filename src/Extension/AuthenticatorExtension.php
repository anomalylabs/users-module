<?php namespace Anomaly\Streams\Addon\Module\Users\Extension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class AuthenticatorExtension
 *
 * Authenticator extensions are used to authenticate
 * credentials against an authentication
 * interface of some sort.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Extension
 */
class AuthenticatorExtension extends Extension
{

    /**
     * Return the handler class.
     *
     * @return null|string
     */
    public function toHandler()
    {
        return $this->transform(__FUNCTION__);
    }
}
 