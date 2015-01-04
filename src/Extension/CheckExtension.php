<?php namespace Anomaly\UsersModule\Extension;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class CheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Extension
 */
abstract class CheckExtension extends Extension
{

    /**
     * Perform security check at login.
     *
     * @param UserInterface $user
     * @return mixed
     */
    abstract public function login(UserInterface $user);

    /**
     * Perform security check at authorization check.
     *
     * @param UserInterface $user
     * @return mixed
     */
    abstract public function check(UserInterface $user);

    /**
     * Perform security check after failed login attempt.
     *
     * @param UserInterface $user
     * @return mixed
     */
    abstract public function fail(UserInterface $user = null);
}
