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

    protected $roles;

    function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Handle the command.
     *
     * @param CreateRoleCommand $command
     * @return mixed
     */
    public function handle(CreateRoleCommand $command)
    {
        return $this->roles->create($command->getName(), $command->getSlug(), $command->getPermissions());
    }
}
 