<?php namespace Anomaly\UsersModule\Suspension\Command;

use Anomaly\UsersModule\Suspension\Contract\SuspensionRepositoryInterface;
use Anomaly\UsersModule\Suspension\Event\UserWasReinstated;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

/**
 * Class ReinstateUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Suspension\Command
 */
class ReinstateUser implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new ReinstateUser instance.
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
     * @param SuspensionRepositoryInterface $suspensions
     * @param Dispatcher                    $events
     */
    public function handle(SuspensionRepositoryInterface $suspensions, Dispatcher $events)
    {
        if (!$suspension = $suspensions->findByUserId($this->user->getId())) {
            return;
        }

        $suspensions->delete($suspension);

        $events->fire(new UserWasReinstated($this->user));
    }
}
