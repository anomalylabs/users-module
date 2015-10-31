<?php namespace Anomaly\UsersModule\User\Plugin\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetLogoutPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Plugin\Command
 */
class GetLogoutPath implements SelfHandling
{

    /**
     * The redirect URL/path.
     *
     * @var null|string
     */
    protected $redirect;

    /**
     * Create a new GetLogoutPath instance.
     *
     * @param null $redirect
     */
    public function __construct($redirect = null)
    {
        $this->redirect = $redirect;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @return string
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        return $this->redirect ?: $settings->value('anomaly.module.users::logout_path', '/');
    }
}
