<?php namespace Anomaly\UsersModule\User\Notification;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Notification\Message\MailMessage;

class UserHasRegistered extends Notification
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
        return ['mail', 'slack', 'database'];
    }

    /**
     * Return the mail message.
     *
     * @param  UserInterface $notifiable
     * @return MailMessage
     */
    public function toMail(UserInterface $notifiable)
    {
        $data = $this->user->toArray();

        return (new MailMessage())
            ->success()
            ->view('anomaly.module.users::notifications.user_has_registered')
            ->subject(trans('anomaly.module.users::notification.user_has_registered.subject', $data))
            ->line(trans('anomaly.module.users::notification.user_has_registered.instructions', $data))
            ->action(trans('anomaly.module.users::notification.user_has_registered.button', $data), $this->user->route('view'));
    }

    /**
     * Return the slack message.
     *
     * @param UserInterface $notifiable
     *
     * @return SlackMessage
     */
    public function toSlack(UserInterface $notifiable)
    {
        return (new SlackMessage())
            ->success()
            ->content('Hmm.. What\'s Ryan up to?')
            ->attachment(function ($attachment) {
                $attachment
                    ->title('Testing out teh goodies!', 'http://pyrocms.com/')
                    ->fields([
                        'Username' => $this->user->getUsername(),
                        'Eamil'    => $this->user->getEmail(),
                    ]);
            });
        ;
    }

    /**
     * Return the array storage data.
     *
     * @param Notifiable $notifiable
     *
     * @return array
     */
    public function toDatabase(UserInterface $notifiable)
    {
        return [
            'user' => $this->user,
        ];
    }
}
