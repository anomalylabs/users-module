<?php namespace Anomaly\UsersModule\User\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;

/**
 * Class GetLogoutPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
