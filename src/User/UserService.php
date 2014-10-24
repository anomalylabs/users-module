<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationService;
use Anomaly\Streams\Addon\Module\Users\User\Command\CreateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\FindUserByCredentialsCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\FindUserByIdCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\FindUserByPersistenceCodeCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\UpdateUserCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\User\Command\ChangePasswordCommand;

class UserService
{
    use CommandableTrait;

    protected $activation;

    function __construct(ActivationService $activation)
    {
        $this->activation = $activation;
    }

    public function create(array $credentials, $activate = false)
    {
        $command = new CreateUserCommand($credentials);

        $user = $this->execute($command);

        if (evaluate($activate) == true) {

            $this->activation->force($user);

        }

        return $user;
    }

    public function update(UserInterface $user, array $credentials = [], array $data = [])
    {
        $command = new UpdateUserCommand($user->getAuthIdentifier(), $credentials, $data);

        return $this->execute($command);
    }

    public function findById($userId)
    {
        $command = new FindUserByIdCommand($userId);

        return $this->execute($command);
    }

    public function findByCredentials(array $credentials)
    {
        $command = new FindUserByCredentialsCommand($credentials);

        return $this->execute($command);
    }

    public function findByPersistenceCode($code)
    {
        $command = new FindUserByPersistenceCodeCommand($code);

        return $this->execute($command);
    }

    public function changePassword(UserInterface $user, $password)
    {
        $command = new ChangePasswordCommand($user->getAuthIdentifier(), $password);

        return $this->execute($command);
    }
}
 