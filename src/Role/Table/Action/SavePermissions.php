<?php namespace Anomaly\UsersModule\Role\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Http\Request;

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
     * @param Table                   $table
     * @param RoleRepositoryInterface $roles
     * @param Request                 $request
     */
    public function handle(Table $table, RoleRepositoryInterface $roles, Request $request)
    {
        /* @var RoleInterface $role */
        $role = $table->getOption('role');

        $roles->updatePermissions($role, array_get($_POST, 'permission', []));

        $table->setResponse(redirect($request->fullUrl()));

        $this->messages->success(
            trans('module::message.save_role_permissions_success', ['slug' => $role->getSlug()])
        );
    }
}
