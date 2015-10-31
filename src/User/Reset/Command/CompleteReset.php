<?php namespace Anomaly\UsersModule\User\Reset\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CompleteReset
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset\Command
 */
class CompleteReset implements SelfHandling
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
     * Create a new CompleteResetReset instance.
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
     * @param UserRepositoryInterface $users
     * @return bool
     */
    public function handle(UserRepositoryInterface $users)
    {
        $user = $users->findByResetCode($this->code);

        if (!$user) {
            return false;
        }

        if ($user->getId() !== $this->user->getId()) {
            return false;
        }

        $this->user->setResetCode(null);
        $this->user->setPassword($this->password);

        $users->save($this->user);

        return true;
    }
}
