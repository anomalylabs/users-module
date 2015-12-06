<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class GetUser implements SelfHandling
{

    /**
     * The user identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetUser instance.
     *
     * @param $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param UserRepositoryInterface $users
     * @param Guard                   $auth
     * @return \Anomaly\UsersModule\User\Contract\UserInterface|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function handle(UserRepositoryInterface $users, Guard $auth)
    {
        if (is_null($this->identifier)) {
            return $auth->user();
        }

        if (is_numeric($this->identifier)) {
            return $users->find($this->identifier);
        }

        if (filter_var($this->identifier, FILTER_VALIDATE_EMAIL)) {
            return $users->findByEmail($this->identifier);
        }

        if (!is_numeric($this->identifier)) {
            return $users->findByUsername($this->identifier);
        }

        return null;
    }
}
