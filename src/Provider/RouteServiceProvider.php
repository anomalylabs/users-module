<?php namespace Anomaly\UsersModule\Provider;

use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Provider
 */
class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controller namespace prefix for this addon.
     *
     * @var string
     */
    protected $prefix = 'Anomaly\UsersModule\Http\Controller\\';

    /**
     * Define the routes for the Users module.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $this->mapLoginRoute($router);
        $this->mapLogoutRoute($router);
        $this->mapUsersRoutes($router);
        $this->mapRolesRoutes($router);
        $this->mapDefaultRoute($router);
        $this->mapPermissionsRoutes($router);
    }

    /**
     * Register the default admin route.
     *
     * @param Router $router
     */
    protected function mapDefaultRoute(Router $router)
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
    }

    /**
     * Register the login routes.
     *
     * @param Router $router
     */
    protected function mapLoginRoute(Router $router)
    {
        /**
         * Since laravel points to these by default
         * let's just ping back to what we expect (admin).
         */
        $router->get(
            'auth/login',
            function () {

                return redirect('admin/login');
            }
        );

        /**
         * Handle the login page and login attempt.
         */
        $router->get('admin/login', $this->prefix . 'Admin\LoginController@login');
        $router->post('admin/login', $this->prefix . 'Admin\LoginController@attempt');
    }

    /**
     * Register the logout route.
     *
     * @param Router $router
     */
    protected function mapLogoutRoute(Router $router)
    {
        /**
         * Handle logging out.
         */
        $router->get(
            'admin/logout',
            function () {

                app('auth')->logout();

                return redirect('auth/login');
            }
        );
    }

    /**
     * Register Users routes.
     *
     * @param Router $router
     */
    protected function mapUsersRoutes(Router $router)
    {
        $router->any('admin/users', $this->prefix . 'Admin\UsersController@index');
        $router->any('admin/users/create', $this->prefix . 'Admin\UsersController@create');
        $router->any('admin/users/edit/{id}', $this->prefix . 'Admin\UsersController@edit');
        $router->any('admin/users/activate/{id}', $this->prefix . 'Admin\UsersController@activate');
        $router->any('admin/users/deactivate/{id}', $this->prefix . 'Admin\UsersController@deactivate');
        $router->any('admin/users/block/{id}', $this->prefix . 'Admin\UsersController@block');
        $router->any('admin/users/unblock/{id}', $this->prefix . 'Admin\UsersController@unblock');
        $router->any('admin/users/logout/{id}', $this->prefix . 'Admin\UsersController@logout');
    }

    /**
     * Register the Roles routes.
     *
     * @param Router $router
     */
    protected function mapRolesRoutes(Router $router)
    {
        $router->any('admin/users/roles', $this->prefix . 'Admin\RolesController@index');
        $router->any('admin/users/roles/create', $this->prefix . 'Admin\RolesController@create');
        $router->any('admin/users/roles/edit/{id}', $this->prefix . 'Admin\RolesController@edit');
    }

    /**
     * Register the permissions routes.
     *
     * @param Router $router
     */
    protected function mapPermissionsRoutes(Router $router)
    {
        $router->any('admin/users/permissions', $this->prefix . 'Admin\PermissionsController@index');
        $router->any('admin/users/permissions/{addon}', $this->prefix . 'Admin\PermissionsController@index');
    }
}
