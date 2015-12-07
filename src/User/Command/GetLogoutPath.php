<?php namespace Anomaly\UsersModule\User\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;

/**
 * Class GetLogoutPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class GetLogoutPath implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository $config
     * @return string
     */
    public function handle(Repository $config)
    {
        return $config->get('anomaly.module.users::paths.logout');
    }
}
