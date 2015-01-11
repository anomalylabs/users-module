<?php namespace Anomaly\UsersModule;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class UsersModuleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModuleRouteProvider extends RouteServiceProvider
{

    /**
     * Map generic module routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        /**
         * The default admin route leads to
         * the preferred landing page.
         */
        $router->get(
            'admin',
            function () {

                return redirect('admin/dashboard');
            }
        );

        /**
         * Since laravel points to auth by default
         * let's just ping back to what we expect (admin).
         */
        $router->get(
            'auth/login',
            function () {

                return redirect('admin/login');
            }
        );

        /**
         * Handle logging in and logging out.
         */
        $router->get(
            'admin/login',
            'Anomaly\UsersModule\Http\Controller\Admin\LoginController@login'
        );
        $router->post(
            'admin/login',
            'Anomaly\UsersModule\Http\Controller\Admin\LoginController@attempt'
        );
        $router->get(
            'admin/logout',
            'Anomaly\UsersModule\Http\Controller\Admin\LogoutController@logout'
        );
    }
}
