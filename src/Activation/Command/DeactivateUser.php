<?php namespace Anomaly\UsersModule\Activation\Command;

use Anomaly\UsersModule\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\UsersModule\Activation\Event\UserWasDeactivated;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

/**
 * Class DeactivateUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Command
 */
class DeactivateUser implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new DeactivateUser instance.
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
     * @param Dispatcher                    $events
     * @param ActivationRepositoryInterface $activations
     */
    public function handle(Dispatcher $events, ActivationRepositoryInterface $activations)
    {
        if ($activation = $activations->findByUserId($this->user->getId())) {

            $activations->delete($activation);

            $events->fire(new UserWasDeactivated($this->user));
        }
    }
}
