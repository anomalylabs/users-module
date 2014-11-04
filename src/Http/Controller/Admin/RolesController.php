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
     * Return the table UI for roles.
     *
     * @param RoleTable $ui
     * @return \Illuminate\View\View
     */
    public function index(RoleTable $ui)
    {
        return $ui->make();
    }

    /**
     * Return the form UI for an existing role.
     *
     * @param RoleForm $ui
     * @param             $id
     * @return \Illuminate\View\View
     */
    public function edit(RoleForm $ui, $id)
    {
        return $ui->make($id);
    }
}
 