<?php namespace Anomaly\UsersModule\User\Plugin\Command;

use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CheckUserRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Plugin\Command
 */
class CheckUserRole implements SelfHandling
{

    /**
     * The role identifier.
     *
     * @var string
     */
    protected $identifier;

    /**
     * Create a new CheckUserRole instance.
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
     * @param RoleRepositoryInterface $roles
     * @param Guard                   $guard
     * @return bool
     */
    public function handle(RoleRepositoryInterface $roles, Guard $guard)
    {
        /* @var UserInterface $user */
        if (!$user = $guard->user()) {
            return false;
        }

        if (is_numeric($this->identifier)) {
            return $user->hasRole($roles->find($this->identifier));
        }

        if (is_string($this->identifier)) {
            return $user->hasRole($roles->findBySlug($this->identifier));
        }

        return false;
    }
}
