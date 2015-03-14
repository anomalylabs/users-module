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

        /**
         * Users routes.
         */
        $router->any(
            'admin/users',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@index'
        );

        $router->any(
            'admin/users/create',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@create'
        );

        $router->any(
            'admin/users/edit/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@edit'
        );

        $router->any(
            'admin/users/delete/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@delete'
        );

        $router->any(
            'admin/users/activate/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@activate'
        );

        $router->any(
            'admin/users/deactivate/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@deactivate'
        );

        $router->any(
            'admin/users/block/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@block'
        );

        $router->any(
            'admin/users/unblock/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@unblock'
        );

        $router->any(
            'admin/users/logout/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\UsersController@logout'
        );

        /**
         * Role routes.
         */
        $router->any(
            'admin/users/roles',
            'Anomaly\UsersModule\Http\Controller\Admin\RolesController@index'
        );

        $router->any(
            'admin/users/roles/create',
            'Anomaly\UsersModule\Http\Controller\Admin\RolesController@create'
        );

        $router->any(
            'admin/users/roles/edit/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\RolesController@edit'
        );

        /**
         * Permission routes.
         */
        $router->any(
            'admin/users/permissions/{id?}',
            'Anomaly\UsersModule\Http\Controller\Admin\PermissionsController@index'
        );
    }
}
