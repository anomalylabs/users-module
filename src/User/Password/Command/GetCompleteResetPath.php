<?php namespace Anomaly\UsersModule\User\Password\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Encryption\Encrypter;

/**
 * Class GetResetPasswordPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Password\Command
 */
class GetResetPasswordPath implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new GetResetPasswordPath instance.
     *
     * @param $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the command.
     *
     * @param Repository $config
     * @param Encrypter  $encrypter
     * @return string
     */
    public function handle(Repository $config, Encrypter $encrypter)
    {
        $email = $encrypter->encrypt($this->user->getEmail());
        $code  = $encrypter->encrypt($this->user->getResetCode());

        return $config->get('anomaly.module.users::reset.paths.complete') . '?' . http_build_query(
            compact('email', 'code')
        );
    }
}
