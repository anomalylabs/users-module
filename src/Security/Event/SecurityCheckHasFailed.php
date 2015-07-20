<?php namespace Anomaly\UsersModule\Security\Event;

use Anomaly\UsersModule\Security\SecurityCheckExtension;

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
     * @var SecurityCheckExtension
     */
    protected $check;

    /**
     * Create a new SecurityCheckHasFailed instance.
     *
     * @param SecurityCheckExtension $check
     */
    public function __construct(SecurityCheckExtension $check)
    {
        $this->check = $check;
    }

    /**
     * Get the security check.
     *
     * @return SecurityCheckExtension
     */
    public function getCheck()
    {
        return $this->check;
    }
}
