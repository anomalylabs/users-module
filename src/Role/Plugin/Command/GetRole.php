<?php namespace Anomaly\UsersModule\Role\Plugin\Command;

use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Anomaly\UsersModule\Role\RolePresenter;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Plugin\Command
 */
class GetRole implements SelfHandling
{

    /**
     * The role identifier.
     *
     * @var string
     */
    protected $identifier;

    /**
     * Create a new GetRole instance.
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
     * @param Decorator               $decorator
     * @param Guard                   $guard
     * @return RolePresenter|null
     */
    public function handle(RoleRepositoryInterface $roles, Decorator $decorator, Guard $guard)
    {
        if (is_numeric($this->identifier)) {
            return $decorator->decorate($roles->find($this->identifier));
        }

        if (is_string($this->identifier)) {
            return $decorator->decorate($roles->findBySlug($this->identifier));
        }

        return null;
    }

}
