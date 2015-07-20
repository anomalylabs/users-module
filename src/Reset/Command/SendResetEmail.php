<?php namespace Anomaly\UsersModule\Reset\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\Reset\Contract\ResetRepositoryInterface;
use Anomaly\UsersModule\Reset\Exception\UserIsAlreadyActivated;
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
     * @param ResetRepositoryInterface   $resets
     * @return bool
     */
    public function handle(
        Mailer $mailer,
        SettingRepositoryInterface $settings,
        ResetRepositoryInterface $resets
    ) {
        $reset = $resets->findByUserId($this->user->getId());

        if ($reset) {
            return false;
        }

        if (!$reset) {
            $reset = $resets->create(['user' => $this->user]);
        }

        return $mailer->send(
            'anomaly.module.users::email/reset',
            ['user' => $this->user, 'reset' => $reset],
            function (Message $message) use ($settings) {

                $message
                    ->subject('Confirmation')
                    ->to($this->user->getEmail(), $this->user->getDisplayName())
                    ->from($settings->get('streams::server_email', 'noreply@pyrocms.com'));
            }
        );
    }
}
