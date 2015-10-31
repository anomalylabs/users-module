<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\Redirector;

/**
 * Class HandleManualRegistration
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class HandleManualRegistration implements SelfHandling
{

    /**
     * The form builder.
     *
     * @var RegisterFormBuilder
     */
    protected $builder;

    /**
     * Create a new HandleManualRegistration instance.
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
     * @param MessageBag                 $messages
     * @param Redirector                 $redirect
     */
    public function handle(SettingRepositoryInterface $settings, MessageBag $messages, Redirector $redirect)
    {
        $messages->info('anomaly.module.users::message.pending_admin_activation');

        $this->builder->setFormResponse(
            $redirect->to($settings->value('anomaly.module.users::register_redirect', '/'))
        );
    }

}
