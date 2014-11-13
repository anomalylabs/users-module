<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class LogoutUserCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class LogoutUserCommand
{

    /**
     * The user object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    /**
     * The forget flag.
     *
     * @var
     */
    protected $forget;

    /**
     * Create a new LogoutUserCommand instance.
     *
     * @param UserInterface $user
     * @param bool          $forget
     */
    function __construct(UserInterface $user, $forget = false)
    {
        $this->user   = $user;
        $this->forget = $forget;
    }

    /**
     * Get the user object.
     *
     * @return \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the forget flag.
     *
     * @return mixed
     */
    public function getForget()
    {
        return $this->forget;
    }
}
 