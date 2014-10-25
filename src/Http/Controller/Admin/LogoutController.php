<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Login\LoginService;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class LogoutController extends AdminController
{

    public function logout(LoginService $login)
    {
        $login->logout();

        return redirect('admin/login');
    }

}
 