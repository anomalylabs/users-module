<?php namespace Anomaly\UsersModule\Activation\Command;

use Anomaly\UsersModule\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\UsersModule\Activation\Event\UserWasActivated;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

/**
 * Class ActivateUserByForce
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Command
 */
class ActivateUserByForce implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new ActivateUserByForce instance.
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
            $activations->save(
                $activation
                    ->setCode(null)
                    ->setCompleted(true)
            );
        } else {
            $activations->create(
                [
                    'completed' => true,
                    'user'      => $this->user
                ]
            );
        }

        $events->fire(new UserWasActivated($this->user));
    }
}
