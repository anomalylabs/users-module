<?php namespace Anomaly\UsersModule\Reset\Event;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserPasswordWasReset
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Event
 */
class UserPasswordWasReset
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new UserPasswordWasReset instance.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
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
}
