<?php namespace Anomaly\UsersModule\Activation\Command;

use Anomaly\UsersModule\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\UsersModule\Activation\Event\UserWasActivated;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

/**
 * Class ActivateUserByCode
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Command
 */
class ActivateUserByCode implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The activation code.
     *
     * @var string
     */
    protected $code;

    /**
     * Create a new ActivateUserByCode instance.
     *
     * @param UserInterface $user
     * @param               $code
     */
    public function __construct(UserInterface $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Handle the command.
     *
     * @param Dispatcher                    $events
     * @param ActivationRepositoryInterface $activations
     * @return bool
     */
    public function handle(Dispatcher $events, ActivationRepositoryInterface $activations)
    {
        $activation = $activations->findByCode($this->code);

        if (!$activation) {
            return false;
        }

        if (!$user = $activation->getUser()) {
            return false;
        }

        if ($user->getId() !== $this->user->getId()) {
            return false;
        }

        $success = $activations->save(
            $activation
                ->setCode(null)
                ->setCompleted(true)
        );

        $events->fire(new UserWasActivated($this->user));

        return $success;
    }
}
