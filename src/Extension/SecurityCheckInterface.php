<?php namespace Anomaly\Streams\Addon\Module\Users\Extension;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Interface SecurityCheckInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Extension
 */
interface SecurityCheckInterface
{

    /**
     * Security check during login.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function login(UserInterface $user);

    /**
     * Security check during authentication check.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function check(UserInterface $user);
}
 