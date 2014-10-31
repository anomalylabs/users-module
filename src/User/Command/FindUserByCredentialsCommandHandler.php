<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class FindUserByCredentialsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class FindUserByCredentialsCommandHandler
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new FindUserByCredentialsCommandHandler instance.
     *
     * @param UserRepositoryInterface $users
     */
    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param FindUserByCredentialsCommand $command
     * @return mixed
     */
    public function handle(FindUserByCredentialsCommand $command)
    {
        $credentials = $command->getCredentials();

        if (isset($credentials['email'])) {

            $login = $credentials['email'];
        } else {

            $login = $credentials['username'];
        }

        return $this->users->findUserByLoginAndPassword($login, $credentials['password']);
    }
}
 