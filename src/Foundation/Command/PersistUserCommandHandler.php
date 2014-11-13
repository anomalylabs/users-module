<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Support\Cookie;

/**
 * Class PersistUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class PersistUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param PersistUserCommand $command
     * @param Cookie             $cookie
     */
    public function handle(PersistUserCommand $command, Cookie $cookie)
    {
        $user = $command->getUser();

        $cookie->put($user->getId());
    }
}
 