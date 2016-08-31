<?php namespace Anomaly\UsersModule\User\Notification;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Notification\Message\MailMessage;

class ActivateYourAccount extends Notification
{
    /**
     * The user who registered.
     *
     * @var UserInterface
     */
    public $user;

    /**
     * Create a new UserHasRegistered instance.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
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
            ->success()
            ->line('Howdy ' . $this->user->getUsername() . ' please confirm your email!')
            ->action('Confirmed!', url('activate'));
    }
}
