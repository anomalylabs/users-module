<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Event\PasswordWasChangedEvent;
use Anomaly\Streams\Platform\Support\Observer;

/**
 * Class UserModelObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserModelObserver extends Observer
{

    /**
     * Fired when password is changed.
     *
     * @param UserInterface $user
     */
    public function passwordChanged(UserInterface $user)
    {
        $this->dispatch(new PasswordWasChangedEvent($user->getId()));
    }
}
 