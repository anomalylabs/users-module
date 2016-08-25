<?php namespace Anomaly\UsersModule\User\Password\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class SendResetEmail
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SendResetEmail
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
     * @param  Mailer     $mailer
     * @param  Repository $config
     * @return bool
     */
    public function handle(Mailer $mailer, Repository $config)
    {
        $path = $this->dispatch(new GetResetPasswordPath($this->user, $this->redirect));

        $mailer->send(
            'anomaly.module.users::message/reset',
            compact('user', 'path'),
            function (Message $message) use ($config) {
                $message
                    ->subject('Reset your password')
                    ->to($this->user->getEmail(), $this->user->getDisplayName())
                    ->from($config->get('mail.from.address', 'noreply@localhost'));
            }
        );

        return empty($mailer->failures());
    }
}
