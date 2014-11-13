<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class LoginUserCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class LoginUserCommand
{

    /**
     * The user object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    /**
     * The remember flag.
     *
     * @var
     */
    protected $remember;

    /**
     * Create a new LoginUserCommand instance.
     *
     * @param UserInterface $user
     * @param bool          $remember
     */
    function __construct(UserInterface $user, $remember = false)
    {
        $this->user     = $user;
        $this->remember = $remember;
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
     * Get the remember flag.
     *
     * @return mixed
     */
    public function getRemember()
    {
        return $this->remember;
    }
}
 