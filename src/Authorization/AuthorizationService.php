<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization;

use Anomaly\Streams\Addon\Module\Users\Authorization\Command\CheckAuthorizationCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class AuthorizationService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Authorization
 */
class AuthorizationService
{

    use CommandableTrait;

    /**
     * Check if there is an authorized user session active.
     *
     * @return mixed
     */
    public function check()
    {
        $command = new CheckAuthorizationCommand();

        return $this->execute($command);
    }

    /**
     * Check if their is a guest session active.
     *
     * @return bool
     */
    public function isGuest()
    {
        return !($this->check());
    }
}
 