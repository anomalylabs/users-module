<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserWasKickedOut
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Event
 */
class UserWasKickedOut
{

    /**
     * The user object.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The reason code the
     * user was kicked out.
     *
     * @var string
     */
    protected $reason;

    /**
     * Create a new UserWasKickedOut instance.
     *
     * @param UserInterface $user
     * @param               $reason
     */
    function __construct(UserInterface $user, $reason)
    {
        $this->user   = $user;
        $this->reason = $reason;
    }

    /**
     * Get the user.
     *
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the reason.
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}
