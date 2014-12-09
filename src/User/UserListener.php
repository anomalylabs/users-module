<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasCreatedEvent;
use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasDeletedEvent;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\Events\EventListener;

/**
 * Class UserListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserListener extends EventListener
{

    use CommanderTrait;

    /**
     * Fired after a user was created.
     *
     * @param UserWasCreatedEvent $event
     * @return mixed
     */
    public function whenUserWasCreated(UserWasCreatedEvent $event)
    {
        $user = $event->getUser();

        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Profile\Command\CreateProfileCommand',
            compact('user')
        );
    }

    /**
     * Fire after a user was deleted.
     *
     * @param UserWasDeletedEvent $event
     * @return mixed
     */
    public function whenUserWasDeleted(UserWasDeletedEvent $event)
    {
        $user = $event->getUser();
        $id   = $user->getId();

        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Profile\Command\DeleteProfileCommand',
            compact('id')
        );
    }
}
 