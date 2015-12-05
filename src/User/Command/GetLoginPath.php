<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetLoginPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class GetLoginPath implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @return mixed|null
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        return $settings->value('anomaly.module.users::login_path', 'login');
    }
}
