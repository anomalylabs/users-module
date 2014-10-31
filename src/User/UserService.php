<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationService;
use Anomaly\Streams\Addon\Module\Users\User\Command\ChangePasswordCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\CreateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\FindUserByCredentialsCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\FindUserByIdCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\FindUserByPersistenceCodeCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\UpdateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class UserService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserService
{

    use CommandableTrait;

    /**
     * The activation service object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\ActivationService
     */
    protected $activation;

    /**
     * @param ActivationService $activation
     */
    function __construct(ActivationService $activation)
    {
        $this->activation = $activation;
    }

    /**
     * Create a new user.
     *
     * @param array $credentials
     * @param bool  $activate
     * @return mixed
     */
    public function create(array $credentials, $activate = false)
    {
        $command = new CreateUserCommand($credentials);

        $user = $this->execute($command);

        if ($activate == true) {

            $this->activation->force($user);
        }

        return $user;
    }

    /**
     * Update a user.
     *
     * @param UserInterface $user
     * @param array         $credentials
     * @param array         $data
     * @return mixed
     */
    public function update(UserInterface $user, array $credentials = [], array $data = [])
    {
        $command = new UpdateUserCommand($user->getUserId(), $credentials, $data);

        return $this->execute($command);
    }

    /**
     * Find a user by ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findById($userId)
    {
        $command = new FindUserByIdCommand($userId);

        return $this->execute($command);
    }

    /**
     * Find a user by credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function findByCredentials(array $credentials)
    {
        $command = new FindUserByCredentialsCommand($credentials);

        return $this->execute($command);
    }

    /**
     * Find a user by persistence code.
     *
     * @param $code
     * @return mixed
     */
    public function findByPersistenceCode($code)
    {
        $command = new FindUserByPersistenceCodeCommand($code);

        return $this->execute($command);
    }

    /**
     * Chance the password for a user.
     *
     * @param UserInterface $user
     * @param               $password
     * @return mixed
     */
    public function changePassword(UserInterface $user, $password)
    {
        $command = new ChangePasswordCommand($user->getUserId(), $password);

        return $this->execute($command);
    }
}
 