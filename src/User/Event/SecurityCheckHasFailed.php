<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Security\Contract\SecurityCheckInterface;

/**
 * Class SecurityCheckHasFailed
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Security\Event
 */
class SecurityCheckHasFailed
{

    /**
     * The security check.
     *
     * @var SecurityCheckInterface
     */
    protected $check;

    /**
     * Create a new SecurityCheckHasFailed instance.
     *
     * @param SecurityCheckInterface $check
     */
    public function __construct(SecurityCheckInterface $check)
    {
        $this->check = $check;
    }

    /**
     * Get the security check.
     *
     * @return SecurityCheckInterface
     */
    public function getCheck()
    {
        return $this->check;
    }
}
