<?php namespace Anomaly\UsersModule\Reset;

use Anomaly\UsersModule\Reset\Command\CompletePasswordReset;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ResetManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset
 */
class ResetManager
{

    use DispatchesJobs;

    /**
     * Complete a password reset request.
     *
     * @param UserInterface $user
     * @param               $code
     * @param               $password
     * @return bool
     */
    public function complete(UserInterface $user, $code, $password)
    {
        return $this->dispatch(new CompletePasswordReset($user, $code, $password));
    }
}
