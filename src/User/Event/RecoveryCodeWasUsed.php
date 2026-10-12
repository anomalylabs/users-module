<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class RecoveryCodeWasUsed
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class RecoveryCodeWasUsed
{

    /**
     * The user object.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new RecoveryCodeWasUsed instance.
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
