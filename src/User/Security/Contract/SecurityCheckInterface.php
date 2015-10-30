<?php namespace Anomaly\UsersModule\User\Security\Contract;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface SecurityCheckInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Security\Contract
 */
interface SecurityCheckInterface
{

    /**
     * Check a login attempt.
     *
     * @return bool|Response
     */
    public function attempt();

    /**
     * Check an HTTP request.
     *
     * @param UserInterface $user
     * @return bool|Response
     */
    public function check(UserInterface $user);
}
