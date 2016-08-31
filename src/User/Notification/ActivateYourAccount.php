<?php namespace Anomaly\UsersModule\User\Notification;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Notification\Message\MailMessage;

class ActivateYourAccount extends Notification
{
    /**
     * The notification view.
     *
     * @var string
     */
    public $view = 'anomaly.module.users::notifications.activate';

    /**
     * Redirect here after activating.
     *
     * @var string
     */
    public $redirect;

    /**
     * Create a new UserHasRegistered instance.
     *
     * @param $redirect
     */
    public function __construct($redirect = '/')
    {
        $this->redirect = $redirect;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  UserInterface $notifiable
     * @return array
     */
    public function via(UserInterface $notifiable)
    {
        return ['mail'];
    }

    /**
     * Return the mail message.
     *
     * @param  UserInterface $notifiable
     * @return MailMessage
     */
    public function toMail(UserInterface $notifiable)
    {
        return (new MailMessage())
            ->greeting(trans('anomaly.module.users::notifications/activate.greeting', $notifiable->toArray()))
            ->line(trans('anomaly.module.users::notifications/activate.instructions', $notifiable->toArray()))
            ->action(trans('anomaly.module.users::notifications/activate.button', $notifiable->toArray()), $notifiable->route('activate', ['redirect' => $this->redirect]));
    }
}
