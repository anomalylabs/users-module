<?php namespace Anomaly\UsersModule\User\Plugin\Command;

use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CheckUserPermission
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Plugin\Command
 */
class CheckUserPermission implements SelfHandling
{

    /**
     * The permission key.
     *
     * @var string
     */
    protected $permission;

    /**
     * Create a new CheckUserPermission instance.
     *
     * @param $permission
     */
    public function __construct($permission)
    {
        $this->permission = $permission;
    }

    /**
     * Handle the command.
     *
     * @param Authorizer $authorizer
     * @param Guard      $guard
     * @return bool
     */
    public function handle(Authorizer $authorizer, Guard $guard)
    {
        /* @var UserInterface $user */
        if (!$user = $guard->user()) {
            return false;
        }

        return $authorizer->authorize($this->permission, $user);
    }
}
