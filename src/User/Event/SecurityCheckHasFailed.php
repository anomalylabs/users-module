<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

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
     * @var Extension
     */
    protected $check;

    /**
     * Create a new SecurityCheckHasFailed instance.
     *
     * @param Extension $check
     */
    public function __construct(Extension $check)
    {
        $this->check = $check;
    }

    /**
     * Get the security check.
     *
     * @return Extension
     */
    public function getCheck()
    {
        return $this->check;
    }
}
