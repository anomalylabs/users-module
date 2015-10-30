<?php namespace Anomaly\UsersModule\Reset\Command;

use Anomaly\UsersModule\Reset\Contract\ResetRepositoryInterface;
use Anomaly\UsersModule\Reset\Event\UserPasswordWasReset;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

/**
 * Class CompletePasswordReset
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Command
 */
class CompletePasswordReset implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The password reset code.
     *
     * @var string
     */
    protected $code;

    /**
     * The password desired.
     *
     * @var string
     */
    protected $password;

    /**
     * Create a new CompletePasswordReset instance.
     *
     * @param UserInterface $user
     * @param               $code
     * @param               $password
     */
    function __construct(UserInterface $user, $code, $password)
    {
        $this->user     = $user;
        $this->code     = $code;
        $this->password = $password;
    }

    /**
     * Handle the command.
     *
     * @param Dispatcher               $events
     * @param ResetRepositoryInterface $resets
     * @param UserRepositoryInterface  $users
     * @return bool
     */
    public function handle(Dispatcher $events, ResetRepositoryInterface $resets, UserRepositoryInterface $users)
    {
        $reset = $resets->findByCode($this->code);

        if (!$reset) {
            return false;
        }

        if (!$user = $reset->getUser()) {
            return false;
        }

        if ($user->getId() !== $this->user->getId()) {
            return false;
        }

        $resets->delete($reset);

        $users->save($this->user->setPassword($this->password));

        $events->fire(new UserPasswordWasReset($this->user));

        return true;
    }
}
