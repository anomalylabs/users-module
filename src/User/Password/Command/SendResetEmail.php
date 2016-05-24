<?php namespace Anomaly\UsersModule\User\Password\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class SendResetEmail
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Password\Command
 */
class SendResetEmail implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The redirect path.
     *
     * @var string
     */
    protected $redirect;

    /**
     * Create a new SendResetEmail instance.
     *
     * @param UserInterface $user
     * @param string        $redirect
     */
    public function __construct(UserInterface $user, $redirect = '/')
    {
        $this->user     = $user;
        $this->redirect = $redirect;
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
        $path = $this->dispatch(new GetResetPasswordPath($this->user, $this->redirect));

        return $mailer->send(
            'anomaly.module.users::emails/reset',
            [
                'user' => $this->user,
                'path' => $path
            ],
            function (Message $message) use ($settings) {
                $message
                    ->subject('Reset your password')
                    ->to($this->user->getEmail(), $this->user->getDisplayName())
                    ->from($settings->value('streams::server_email', 'noreply@localhost'));
            }
        );
    }
}
