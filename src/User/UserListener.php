<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\Profile\Command\CreateProfileCommand;
use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasCreatedEvent;
use Anomaly\Streams\Platform\Support\Listener;

/**
 * Class UserListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserListener extends Listener
{

    /**
     * Fired after a user was created.
     *
     * @param UserWasCreatedEvent $event
     * @return mixed
     */
    public function whenUserWasCreated(UserWasCreatedEvent $event)
    {
        return $this->execute(new CreateProfileCommand($event->getUser()));
    }
}
 