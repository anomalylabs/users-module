<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Ui\Form\RoleFormBuilder;
use Anomaly\Streams\Addon\Module\Users\Ui\Table\RoleTableBuilder;
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
     * @param RoleTableBuilder $ui
     * @return mixed|null
     */
    public function index(RoleTableBuilder $ui)
    {
        return $ui->render();
    }

    /**
     * Return the form for a new role.
     *
     * @param RoleFormBuilder $ui
     * @return mixed|null
     */
    public function create(RoleFormBuilder $ui)
    {
        return $ui->render();
    }

    /**
     * Return the form for an existing role.
     *
     * @param RoleFormBuilder $ui
     * @param           $id
     * @return mixed|null
     */
    public function edit(RoleFormBuilder $ui, $id)
    {
        return $ui->render($id);
    }
}
 