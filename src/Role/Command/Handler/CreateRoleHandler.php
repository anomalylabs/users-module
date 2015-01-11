<?php namespace Anomaly\UsersModule\Role\Command\Handler;

use Anomaly\UsersModule\Role\Command\CreateRole;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

class CreateRoleHandler
{

    protected $roles;

    function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    public function handle(CreateRole $command)
    {
        return $this->roles->create($command->getName(), $command->getSlug(), $command->getPermissions());
    }
}
