<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class RunSecurityChecksCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class RunSecurityChecksCommand
{

    /**
     * The user object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    /**
     * The point at which we're checking security.
     *
     * @var
     */
    protected $point;

    /**
     * Create a new RunSecurityChecksCommand instance.
     *
     * @param UserInterface $user
     * @param string        $point
     */
    function __construct(UserInterface $user = null, $point = 'check')
    {
        $this->user  = $user;
        $this->point = $point;
    }

    /**
     * Get the point at which we're checking security.
     *
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Get the user object.s
     *
     * @return \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
 