<?php namespace Anomaly\UsersModule\User\Plugin\Command;

use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserPresenter;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Plugin\Command
 */
class GetUser implements SelfHandling
{

    /**
     * The user identifier.
     *
     * @var string
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
     * @param Decorator               $decorator
     * @param Guard                   $guard
     * @return UserPresenter|null
     */
    public function handle(UserRepositoryInterface $users, Decorator $decorator, Guard $guard)
    {
        if (!$this->identifier) {
            return $decorator->decorate($guard->user());
        }

        if (is_numeric($this->identifier)) {
            return $decorator->decorate($users->find($this->identifier));
        }

        if (filter_var($this->identifier, FILTER_VALIDATE_EMAIL)) {
            return $decorator->decorate($users->findByEmail($this->identifier));
        }

        if (is_string($this->identifier)) {
            return $decorator->decorate($users->findByUsername($this->identifier));
        }

        return null;
    }

}
