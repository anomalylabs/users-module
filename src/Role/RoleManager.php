<?php namespace Anomaly\Streams\Addon\Module\Users\Role;

use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\Events\DispatchableTrait;

class RoleManager
{

    use CommanderTrait;

    public function create($role)
    {
        return $this->execute('\Anomaly\Streams\Addon\Module\Users\Role\Command\CreateRoleCommand', $role);
    }
}
 