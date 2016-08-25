<?php namespace Anomaly\UsersModule\User\Password\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Encryption\Encrypter;

/**
 * Class GetResetPasswordPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GetResetPasswordPath
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * The redirect path.
     *
     * @var string
     */
    protected $redirect;

    /**
     * Create a new GetResetPasswordPath instance.
     *
     * @param UserInterface $user
     * @param string        $redirect
     */
    public function __construct(UserInterface $user, $redirect = '/')
    {
        $this->user     = $user;
        $this->redirect = $redirect;
    }

    /**
     * Handle the command.
     *
     * @param  Encrypter $encrypter
     * @return string
     */
    public function handle(Encrypter $encrypter)
    {
        $email = $encrypter->encrypt($this->user->getEmail());
        $code  = $encrypter->encrypt($this->user->getResetCode());

        return "/users/password/reset?email={$email}&code={$code}&redirect={$this->redirect}";
    }
}
