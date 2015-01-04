<?php namespace Anomaly\UsersModule\Role;

use Laracasts\Commander\CommanderTrait;

class RoleManager
{

    use CommanderTrait;

    public function create($role)
    {
        return $this->execute('Anomaly\UsersModule\Role\Command\CreateRoleCommand', $role);
    }
}
