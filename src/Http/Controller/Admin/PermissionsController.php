<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Ui\Table\PermissionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class PermissionsController extends AdminController
{

    public function index(PermissionTableBuilder $table)
    {
        return $table->render();
    }
}
 