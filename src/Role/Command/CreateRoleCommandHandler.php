<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Command;

use Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleRepositoryInterface;

/**
 * Class CreateRoleCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role\Command
 */
class CreateRoleCommandHandler
{

    /**
     * Handle the command.
     *
     * @param CreateRoleCommand       $command
     * @param RoleRepositoryInterface $roles
     * @return mixed
     */
    public function handle(CreateRoleCommand $command, RoleRepositoryInterface $roles)
    {
        return $roles->create($command->getName(), $command->getSlug(), $command->getPermissions());
    }
}
 