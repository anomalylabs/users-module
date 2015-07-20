<?php namespace Anomaly\UsersModule\Role\Permission;

use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

/**
 * Class PermissionFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Permission
 */
class PermissionFormHandler
{

    /**
     * @param PermissionFormBuilder   $builder
     * @param RoleRepositoryInterface $roles
     */
    public function handle(PermissionFormBuilder $builder, RoleRepositoryInterface $roles)
    {
        /* @var RoleInterface $role */
        $role = $builder->getEntry();

        $roles->save($role->mergePermissions($builder->getFormInput()));
    }
}
