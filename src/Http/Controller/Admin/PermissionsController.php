<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\Ui\Table\Permission\PermissionTableBuilder;

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
     * Return the table for existing permissions.
     *
     * @param PermissionTableBuilder $table
     * @param null                   $addon
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(PermissionTableBuilder $table, $addon = null)
    {
        return $table->render();
    }
}
