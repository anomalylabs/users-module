<?php namespace Anomaly\UsersModule\User\Event;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class TwoFactorWasDisabled
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorWasDisabled
{

    /**
     * The user object.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The two-factor method.
     *
     * @var string
     */
    protected $method;

    /**
     * Create a new TwoFactorWasDisabled instance.
     *
     * @param UserInterface $user
     * @param string        $method
     */
    public function __construct(UserInterface $user, $method)
    {
        $this->user   = $user;
        $this->method = $method;
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
     * Get the method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}
