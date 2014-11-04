<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Ui\Form\RoleForm;
use Anomaly\Streams\Addon\Module\Users\Ui\Table\RoleTable;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class RolesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin
 */
class RolesController extends AdminController
{

    /**
     * Return the table for existing roles.
     *
     * @param RoleTable $ui
     * @return mixed|null
     */
    public function index(RoleTable $ui)
    {
        return $ui->render();
    }

    /**
     * Return the form for a new role.
     *
     * @param RoleForm $ui
     * @return mixed|null
     */
    public function create(RoleForm $ui)
    {
        return $ui->render();
    }

    /**
     * Return the form for an existing role.
     *
     * @param RoleForm $ui
     * @param          $id
     * @return mixed|null
     */
    public function edit(RoleForm $ui, $id)
    {
        return $ui->render($id);
    }
}
 