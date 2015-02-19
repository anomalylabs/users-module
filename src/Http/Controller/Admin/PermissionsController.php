<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\Permission\Table\PermissionTableBuilder;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

/**
 * Class PermissionsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class PermissionsController extends AdminController
{

    /**
     * Display an index of save-able permissions.
     *
     * @param PermissionTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(PermissionTableBuilder $table, RoleRepositoryInterface $roles, $id = null)
    {
        if (!$id && $role = $roles->all()->get(1)) {
            return redirect('admin/users/permissions/' . $role->getId());
        }

        return $table->render();
    }
}
