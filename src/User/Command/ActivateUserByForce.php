<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\User;

/**
 * Class ActivateUserByForce
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class ActivateUserByForce
{

    /**
     * The user object.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new ActivateUserByForce instance.
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
