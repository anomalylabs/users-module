<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class StartUserActivation
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class StartUserActivation implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new StartUserActivation instance.
     *
     * @param UserInterface $user
     */
    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the command.
     *
     * @param UserRepositoryInterface $users
     * @return bool
     */
    public function handle(UserRepositoryInterface $users)
    {
        $users->save($this->user->setActivationCode(str_random(40)));

        return true;
    }
}
