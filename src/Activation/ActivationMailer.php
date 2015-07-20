<?php namespace Anomaly\UsersModule\Activation;

use Anomaly\UsersModule\Activation\Command\SendActivationEmail;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ActivationMailer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation
 */
class ActivationMailer
{

    use DispatchesJobs;

    /**
     * Send the activation confirmation email.
     *
     * @param UserInterface $user
     * @return bool
     */
    public function send(UserInterface $user)
    {
        return $this->dispatch(new SendActivationEmail($user));
    }
}
