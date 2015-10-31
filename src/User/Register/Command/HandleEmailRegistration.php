<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\Redirector;

/**
 * Class HandleEmailRegistration
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class HandleEmailRegistration implements SelfHandling
{

    /**
     * The form builder.
     *
     * @var RegisterFormBuilder
     */
    protected $builder;

    /**
     * Create a new HandleEmailRegistration instance.
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
     * @param MessageBag                 $messages
     * @param Redirector                 $redirect
     */
    public function handle(
        SettingRepositoryInterface $settings,
        UserActivator $activator,
        MessageBag $messages,
        Redirector $redirect
    ) {
        $activator->send($this->builder->getFormEntry());

        $messages->info('anomaly.module.users::message.pending_email_activation');

        $this->builder->setFormResponse(
            $redirect->to($settings->value('anomaly.module.users::register_redirect', '/'))
        );
    }

}
