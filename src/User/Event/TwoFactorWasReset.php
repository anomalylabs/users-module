<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class TwoFactorWasReset
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorWasReset
{

    /**
     * The user object.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new TwoFactorWasReset instance.
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
