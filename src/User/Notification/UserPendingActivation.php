<?php namespace Anomaly\UsersModule\User\Notification;

use Anomaly\Streams\Platform\Notification\Message\MailMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

/**
 * Class UserPendingActivation
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UserPendingActivation extends Notification implements ShouldQueue
{

    use Queueable;

    /**
     * The user pending activation.
     *
     * @var UserInterface
     */
    public $user;

    /**
     * Create a new UserPendingActivation instance.
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
        $data = $this->user->toArray();

        return (new MailMessage())
            ->view('anomaly.module.users::notifications.user_pending_activation')
            ->subject(trans('anomaly.module.users::notification.user_pending_activation.subject', $data))
            ->line(trans('anomaly.module.users::notification.user_pending_activation.instructions', $data))
            ->action(
                trans('anomaly.module.users::notification.user_pending_activation.button', $data),
                url('admin/users/edit/' . $this->user->getId())
            );
    }
}
