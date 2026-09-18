<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Carbon\Carbon;


/**
 * Class ActivateUserByCode
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ActivateUserByCode
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
    function __construct(UserInterface $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Handle the command.
     *
     * @param  UserRepositoryInterface $users
     * @return bool
     */
    public function handle(UserRepositoryInterface $users)
    {
        if (!$this->code) {
            return false;
        }

        if (!$user = $users->findByActivationCode($this->code)) {
            return false;
        }

        if ($this->user->getId() !== $user->getId()) {
            return false;
        }

        $expires = $user->getAttribute('activation_code_expires_at');

        if (!$expires || Carbon::parse($expires)->isPast()) {
            return false;
        }

        $this->user->activated                  = true;
        $this->user->activation_code            = null;
        $this->user->activation_code_expires_at = null;

        $users->save($this->user);

        return true;
    }
}
