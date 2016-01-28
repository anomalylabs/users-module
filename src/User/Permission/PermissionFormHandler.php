<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Routing\Redirector;

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
     * Handle the form.
     *
     * @param PermissionFormBuilder   $builder
     * @param UserRepositoryInterface $users
     * @param Redirector              $redirect
     */
    public function handle(PermissionFormBuilder $builder, UserRepositoryInterface $users, Redirector $redirect)
    {
        /* @var UserInterface $user */
        $user = $builder->getEntry();
dd(array_keys(
    array_dot(
        array_map(
            function ($values) {
                return array_combine(array_values($values), array_pad([], count($values), true));
            },
            array_filter($builder->getFormInput())
        )
    )
));
        $users->save(
            $user->setPermissions(
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
