<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserAuthenticator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
abstract class UserAuthenticator extends Extension
{

    /**
     * Authenticate credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
     */
    abstract public function authenticate(array $credentials);
}
