<?php namespace Anomaly\UsersModule\Role\Command;

use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetGuestRole
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\Role\Command
 */
class SetGuestRole implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param RoleRepositoryInterface $roles
     * @param Authorizer              $authorizer
     */
    public function handle(RoleRepositoryInterface $roles, Authorizer $authorizer)
    {
        $authorizer->setGuest($roles->findBySlug('guest'));
    }
}
