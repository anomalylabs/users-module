<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Exception\EmailMustBeUniqueException;
use Anomaly\Streams\Addon\Module\Users\Exception\PasswordRequiredException;
use Anomaly\Streams\Addon\Module\Users\Exception\UsernameMustBeUniqueException;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class CreateUserCommandValidator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class CreateUserCommandValidator
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Validate the command.
     *
     * @param CreateUserCommand $command
     */
    public function validate(CreateUserCommand $command)
    {
        $this->validateCredentials($command->getCredentials());
    }

    /**
     * Validate credentials.
     *
     * @param $credentials
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\EmailMustBeUniqueException
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\UsernameMustBeUniqueException
     */
    protected function validateCredentials($credentials)
    {
        if ($this->users->findUserByLogin($credentials['email'])) {

            throw new EmailMustBeUniqueException("The email must be unique.");
        }

        if ($this->users->findUserByLogin($credentials['username'])) {

            throw new UsernameMustBeUniqueException("The username must be unique.");
        }

        if (!isset($credentials['password'])) {

            throw new PasswordRequiredException("The password is required.");
        }
    }
}
 