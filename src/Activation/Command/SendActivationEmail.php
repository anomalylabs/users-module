<?php namespace Anomaly\UsersModule\Activation\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\UsersModule\Activation\Exception\UserIsAlreadyActivated;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class SendActivationEmail
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Command
 */
class SendActivationEmail implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new SendActivationEmail instance.
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
     * @param Mailer                        $mailer
     * @param SettingRepositoryInterface    $settings
     * @param ActivationRepositoryInterface $activations
     * @return bool
     */
    public function handle(
        Mailer $mailer,
        SettingRepositoryInterface $settings,
        ActivationRepositoryInterface $activations
    ) {
        $activation = $activations->findByUserId($this->user->getId());

        if ($activation && $activation->isCompleted()) {
            return false;
        }

        if (!$activation) {
            $activation = $activations->create(['user' => $this->user]);
        } else {
            $activations->save($activation->randomizeCode());
        }

        return $mailer->send(
            'module::email/activation',
            ['user' => $this->user, 'activation' => $activation],
            function (Message $message) use ($settings) {

                $message
                    ->subject('Confirmation')
                    ->to($this->user->getEmail(), $this->user->getDisplayName())
                    ->from($settings->get('streams::server_email', 'noreply@pyrocms.com'));
            }
        );
    }
}
