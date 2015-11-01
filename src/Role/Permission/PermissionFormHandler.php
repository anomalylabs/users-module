<?php namespace Anomaly\UsersModule\Role\Permission;

use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Routing\Redirector;

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
     * Handle the form.
     *
     * @param PermissionFormBuilder   $builder
     * @param RoleRepositoryInterface $roles
     * @param Redirector              $redirect
     */
    public function handle(PermissionFormBuilder $builder, RoleRepositoryInterface $roles, Redirector $redirect)
    {
        /* @var RoleInterface $role */
        $role = $builder->getEntry();

        $roles->save(
            $role->setPermissions(
                array_keys(
                    array_dot(
                        array_map(
                            function ($values) {
                                return array_combine(array_values($values), array_pad([], count($values), true));
                            },
                            array_filter($builder->getFormInput())
                        )
                    )
                )
            )
        );

        $builder->setFormResponse($redirect->refresh());
    }
}
