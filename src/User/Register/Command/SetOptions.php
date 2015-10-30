<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class SetOptions implements SelfHandling
{

    /**
     * The register form builder.
     *
     * @var RegisterFormBuilder
     */
    protected $builder;

    /**
     * Create a new SetDefaultOptions instance.
     *
     * @param RegisterFormBuilder $builder
     */
    public function __construct(RegisterFormBuilder $builder)
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
            $this->builder->setOption('redirect', $settings->value('anomaly.module.users::register_redirect', '/'));
            //$this->builder->setOption('redirect', $settings->value('anomaly.module.users::activated_redirect', '/'));
        }

        if (!$this->builder->getOption('success_message')) {
            $this->builder->setOption(
                'success_message',
                $settings->value('anomaly.module.users::register_message', 'Registered..')
            );
        }

        if (!$this->builder->getOption('container_class')) {
            $this->builder->setOption('container_class', 'form-wrapper');
        }
    }

}
