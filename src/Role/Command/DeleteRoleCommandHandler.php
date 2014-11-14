<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Command;

use Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleRepositoryInterface;

/**
 * Class DeleteRoleCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role\Command
 */
class DeleteRoleCommandHandler
{

    /**
     * Handle the command.
     *
     * @param DeleteRoleCommand       $command
     * @param RoleRepositoryInterface $roles
     * @return mixed
     */
    public function handle(DeleteRoleCommand $command, RoleRepositoryInterface $roles)
    {
        return $roles->delete($command->getSlug());
    }
}
 