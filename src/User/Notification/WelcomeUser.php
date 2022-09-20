<?php namespace Anomaly\UsersModule\User\Notification;

use Anomaly\Streams\Platform\Notification\Message\MailMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;


class WelcomeUser extends Notification implements ShouldQueue
{

    use Queueable;


    public $redirect;


    public function __construct($redirect = '/')
    {
        $this->redirect = $redirect;
    }

    public function via(UserInterface $notifiable)
    {
        return ['mail'];
    }


    public function toMail(UserInterface $notifiable)
    {
        $data = $notifiable->toArray();

        return (new MailMessage())
            ->view('anomaly.module.users::notifications.welcome_user')
            ->subject(trans('anomaly.module.users::notification.welcome_user.subject', $data))
            ->greeting(trans('anomaly.module.users::notification.welcome_user.greeting', $data))
            ->line(trans('anomaly.module.users::notification.welcome_user.instructions', $data))
            ->action(
                trans('anomaly.module.users::notification.welcome_user.button', $data),
                $this->redirect != '/' ?$this->redirect: 'https://'.setting_value('streams::domain', 'ocify.co')
            );
    }
}
