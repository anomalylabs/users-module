<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\Ui\Form\RoleFormBuilder;
use Anomaly\UsersModule\Ui\Table\Role\RoleTableBuilder;

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
     * Return the table for existing roles.
     *
     * @param \Anomaly\UsersModule\Ui\Table\Role\RoleTableBuilder $form
     * @return mixed|null
     */
    public function index(RoleTableBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for a new role.
     *
     * @param RoleFormBuilder $form
     * @return mixed|null
     */
    public function create(RoleFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for an existing role.
     *
     * @param RoleFormBuilder $form
     * @param                 $id
     * @return mixed|null
     */
    public function edit(RoleFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
