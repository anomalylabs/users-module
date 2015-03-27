<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\Permission\Table\PermissionTableBuilder;
use Anomaly\UsersModule\Role\Form\RoleFormBuilder;
use Anomaly\UsersModule\Role\Table\RoleTableBuilder;

/**
 * Class RolesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class RolesController extends AdminController
{

    /**
     * Return an index of existing roles.
     *
     * @param RoleTableBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(RoleTableBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for a new role.
     *
     * @param RoleFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(RoleFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing role.
     *
     * @param RoleFormBuilder $form
     * @param                 $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(RoleFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Manage permissions for a role.
     *
     * @param PermissionTableBuilder $table
     * @param                        $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function permissions(PermissionTableBuilder $table, $id)
    {
        $table->setTableOption('role_id', $id);
        
        return $table->render();
    }
}
