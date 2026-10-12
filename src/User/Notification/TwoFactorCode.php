<?php namespace Anomaly\UsersModule\User\Notification;

use Anomaly\Streams\Platform\Notification\Message\MailMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Notifications\Notification;

/**
 * Class TwoFactorCode
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorCode extends Notification
{

    /**
     * The one-time code.
     *
     * @var string
     */
    public $code;

    /**
     * The minutes until the code expires.
     *
     * @var int
     */
    public $minutes;

    /**
     * Create a new TwoFactorCode instance.
     *
     * @param string $code
     * @param int    $minutes
     */
    public function __construct($code, $minutes)
    {
        $this->code    = $code;
        $this->minutes = $minutes;
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
            ->view('anomaly.module.users::notifications.two_factor_code')
            ->subject(trans('anomaly.module.users::notification.two_factor_code.subject'))
            ->greeting(
                trans(
                    'anomaly.module.users::notification.two_factor_code.greeting',
                    ['display_name' => $notifiable->getDisplayName()]
                )
            )
            ->line(trans('anomaly.module.users::notification.two_factor_code.instructions', ['code' => $this->code]))
            ->line(trans('anomaly.module.users::notification.two_factor_code.expiry', ['minutes' => $this->minutes]))
            ->line(trans('anomaly.module.users::notification.two_factor_code.warning'));
    }
}
