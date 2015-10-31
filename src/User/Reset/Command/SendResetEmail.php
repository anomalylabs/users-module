<?php namespace Anomaly\UsersModule\User\Reset\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class SendResetEmail
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset\Command
 */
class SendResetEmail implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new SendResetEmail instance.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the command.
     *
     * @param Mailer                     $mailer
     * @param SettingRepositoryInterface $settings
     * @return mixed
     */
    public function handle(Mailer $mailer, SettingRepositoryInterface $settings)
    {
        return $mailer->send(
            'anomaly.module.users::emails/reset',
            ['user' => $this->user],
            function (Message $message) use ($settings) {
                $message
                    ->subject('Reset your password')
                    ->to($this->user->getEmail(), $this->user->getDisplayName())
                    ->from($settings->value('streams::server_email', 'noreply@localhost'));
            }
        );
    }
}
