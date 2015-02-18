<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\User;

/**
 * Class UserWasLoggedOut
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Event
 */
class UserWasLoggedOut
{

    /**
     * The user object.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new UserWasLoggedOut instance.
     *
     * @param User $user
     */
    function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
