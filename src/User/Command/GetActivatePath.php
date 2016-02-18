<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Encryption\Encrypter;

/**
 * Class GetActivatePath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Command
 */
class GetActivatePath implements SelfHandling
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
     * Create a new GetActivatePath instance.
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
     * @param Repository $config
     * @return string|null
     */
    public function handle(Repository $config, Encrypter $encrypter)
    {
        $email = $encrypter->encrypt($this->user->getEmail());
        $code  = $encrypter->encrypt($this->user->getActivationCode());

        $query = "?email={$email}&code={$code}&redirect={$this->redirect}";

        return $config->get('anomaly.module.users::paths.activate', 'activate') . $query;
    }
}
