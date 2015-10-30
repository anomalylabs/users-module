<?php namespace Anomaly\UsersModule\User\Login\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Login\Command
 */
class SetOptions implements SelfHandling
{

    /**
     * The login form builder.
     *
     * @var LoginFormBuilder
     */
    protected $builder;

    /**
     * Create a new SetDefaultOptions instance.
     *
     * @param LoginFormBuilder $builder
     */
    public function __construct(LoginFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        if (!$this->builder->getOption('redirect')) {
            $this->builder->setOption('redirect', $settings->value('anomaly.module.users::login_redirect', '/'));
        }

        if (!$this->builder->getOption('success_message')) {
            $this->builder->setOption(
                'success_message',
                $settings->value('anomaly.module.users::login_message', 'You are now logged in.')
            );
        }

        if (!$this->builder->getOption('container_class')) {
            $this->builder->setOption('container_class', 'form-wrapper');
        }
    }

}
