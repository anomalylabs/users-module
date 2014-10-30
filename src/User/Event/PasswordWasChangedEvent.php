<?php namespace Anomaly\Streams\Addon\Module\Users\User\Event;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class PasswordWasChangedEvent
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Event
 */
class PasswordWasChangedEvent
{

    /**
     * The user interface object.
     *
     * @var \Symfony\Component\Security\Core\User\UserInterface
     */
    protected $user;

    /**
     * Create a new PasswordWasChangedEvent instance.
     *
     * @param UserInterface $user
     */
    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Get the use interface object.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}
 