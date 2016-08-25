<?php namespace Anomaly\UsersModule\Role\Command;

use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;


/**
 * Class SetGuestRole
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SetGuestRole
{

    /**
     * Handle the command.
     *
     * @param RoleRepositoryInterface $roles
     * @param Authorizer              $authorizer
     */
    public function handle(RoleRepositoryInterface $roles, Authorizer $authorizer)
    {
        if ($guest = $roles->findBySlug('guest')) {
            $authorizer->setGuest($guest);
        }
    }
}
