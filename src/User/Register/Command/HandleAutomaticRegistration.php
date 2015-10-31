<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\Redirector;

/**
 * Class HandleAutomaticRegistration
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class HandleAutomaticRegistration implements SelfHandling
{

    /**
     * The form builder.
     *
     * @var RegisterFormBuilder
     */
    protected $builder;

    /**
     * Create a new HandleAutomaticRegistration instance.
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
     * @param UserActivator              $activator
     * @param Redirector                 $redirect
     */
    public function handle(
        SettingRepositoryInterface $settings,
        UserActivator $activator,
        Redirector $redirect
    ) {
        $activator->force($this->builder->getFormEntry());

        $this->builder->setFormResponse(
            $redirect->to($settings->value('anomaly.module.users::activated_redirect', '/'))
        );
    }

}
