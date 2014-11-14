<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation;

use Anomaly\Streams\Addon\Module\Users\Foundation\Command\RunSecurityChecksCommand;
use Anomaly\Streams\Addon\Module\Users\Foundation\Event\UserWasAuthorizedEvent;
use Anomaly\Streams\Platform\Support\Listener;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class AuthListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation
 */
class AuthListener extends Listener
{

    use CommandableTrait;

    /**
     * Fired after auth->check()
     *
     * @param UserWasAuthorizedEvent $event
     */
    public function whenUserWasAuthorized(UserWasAuthorizedEvent $event)
    {
        $this->execute(new RunSecurityChecksCommand($event->getUser(), 'check'));
    }
}
 