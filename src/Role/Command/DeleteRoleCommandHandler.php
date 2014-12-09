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

    protected $roles;

    function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Handle the command.
     *
     * @param DeleteRoleCommand $command
     * @return mixed
     */
    public function handle(DeleteRoleCommand $command)
    {
        return $this->roles->delete($command->getSlug());
    }
}
 