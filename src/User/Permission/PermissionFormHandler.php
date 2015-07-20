<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class PermissionFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Permission
 */
class PermissionFormHandler
{

    /**
     * @param PermissionFormBuilder   $builder
     * @param UserRepositoryInterface $users
     */
    public function handle(PermissionFormBuilder $builder, UserRepositoryInterface $users)
    {
        /* @var UserInterface $user */
        $user = $builder->getEntry();

        $users->save($user->mergePermissions($builder->getFormInput()));
    }
}
