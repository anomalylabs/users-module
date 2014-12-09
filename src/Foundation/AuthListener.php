<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation;

use Anomaly\Streams\Addon\Module\Users\Foundation\Event\UserWasAuthorizedEvent;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\Events\EventListener;

/**
 * Class AuthListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation
 */
class AuthListener extends EventListener
{

    use CommanderTrait;

    /**
     * Fired after auth->check()
     *
     * @param UserWasAuthorizedEvent $event
     */
    public function whenUserWasAuthorized(UserWasAuthorizedEvent $event)
    {
        $user = $event->getUser();

        $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Foundation\Command\RunSecurityChecksCommand',
            compact('user', 'check')
        );
    }
}
 