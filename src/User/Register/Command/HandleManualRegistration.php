<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\Streams\Platform\Traits\Transmitter;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Anomaly\UsersModule\User\Notification\UserPendingActivation;

class HandleManualRegistration
{
    use Transmitter;

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
     * @param MessageBag $messages
     */
    public function handle(MessageBag $messages)
    {
        if (!is_null($message = $this->builder->getFormOption('pending_message'))) {
            $messages->info($message);
        }

        $this->transmit(new UserPendingActivation($this->builder->getFormEntry()));
    }
}
