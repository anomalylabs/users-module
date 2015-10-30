<?php namespace Anomaly\UsersModule\Reset\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\Reset\Contract\ResetRepositoryInterface;
use Anomaly\UsersModule\Reset\Exception\UserIsAlreadyActivated;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class SendResetEmail
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Command
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
     * @return bool
     */
    public function handle(
        Mailer $mailer,
        SettingRepositoryInterface $settings,
        UserRepositoryInterface $users
    ) {

        die('Send reset mail');

        return $mailer->send(
            'anomaly.module.users::emails/reset',
            ['user' => $this->user, 'reset' => $reset],
            function (Message $message) use ($settings) {

                $setting = $settings->get('streams::server_email');

                $message
                    ->subject('Confirmation')
                    ->to($this->user->getEmail(), $this->user->getDisplayName())
                    ->from($setting ? $setting->getValue() : 'noreply@pyrocms.com');
            }
        );
    }
}
