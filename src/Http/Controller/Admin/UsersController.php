<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Ui\User\UserTableUi;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class UsersController extends AdminController
{

    public function index()
    {
        $ui = new UserTableUi();

        return $ui->make();
    }

}
 