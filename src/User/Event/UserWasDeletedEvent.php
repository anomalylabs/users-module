<?php namespace Anomaly\Streams\Addon\Module\Users\User\Event;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class UserWasDeletedEvent
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Event
 */
class UserWasDeletedEvent
{

    /**
     * The user object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    /**
     * Create a new UserWasDeletedEvent instance.
     *
     * @param UserInterface $user
     */
    function __construct(UserInterface $user)
    {
        $this->user = $user;
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
}
 