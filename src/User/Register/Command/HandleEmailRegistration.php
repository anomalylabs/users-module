<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Anomaly\UsersModule\User\Notification\ActivateYourAccount;

class HandleEmailRegistration
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
     * @param UserActivator $activator
     * @param MessageBag    $messages
     */
    public function handle(UserActivator $activator, MessageBag $messages)
    {
        /* @var UserInterface $user */
        $user = $this->builder->getFormEntry();

        //$activator->send($user, $this->builder->getFormOption('activate_redirect', '/'));

        $user->notify(new ActivateYourAccount($user));

        if (!is_null($message = $this->builder->getFormOption('confirm_message'))) {
            $messages->info($message);
        }
    }
}
