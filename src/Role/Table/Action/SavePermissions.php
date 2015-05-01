<?php namespace Anomaly\UsersModule\Role\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Anomaly\UsersModule\Role\Table\RolePermissionTableBuilder;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class SavePermissions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table\Action
 */
class SavePermissions extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param RolePermissionTableBuilder $builder
     * @param RoleRepositoryInterface    $roles
     * @param Redirector                 $redirector
     * @param Request                    $request
     */
    public function handle(
        RolePermissionTableBuilder $builder,
        RoleRepositoryInterface $roles,
        Redirector $redirector,
        Request $request
    ) {
        $role = $builder->getRole();

        $roles->updatePermissions($role, array_get($_POST, 'permission', []));

        $builder->setTableResponse($redirector->to($request->fullUrl()));

        $this->messages->success(
            trans('module::message.save_role_permissions_success', ['slug' => $role->getSlug()])
        );
    }
}
