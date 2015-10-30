<?php namespace Anomaly\UsersModule\Reset;

use Anomaly\UsersModule\Reset\Command\SendResetEmail;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ResetMailer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset
 */
class ResetMailer
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
        return $this->dispatch(new SendResetEmail($user));
    }
}
