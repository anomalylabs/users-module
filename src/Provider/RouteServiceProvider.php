<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Anomaly\Streams\Addon\Module\Users\Foundation\SessionManager;
use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
 */
class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controllers to scan for route annotations.
     *
     * @var array
     */
    protected $scan = [];

    /**
     * All of the module's route middleware keys.
     *
     * @var array
     */
    protected $middleware = [
        'auth' => 'Anomaly\Streams\Addon\Module\Users\Http\Middleware\CheckAuthentication',
    ];

    /**
     * Called before routes are registered.
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function before()
    {
        //
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->when('admin*', 'auth');

        $this->registerAdminRoutes($router);
        $this->registerLoginRoutes($router);
        $this->registerLogoutRoutes($router);

        $this->registerUserRoutes($router);
        $this->registerRoleRoutes($router);
    }

    /**
     * Register admin routes.
     *
     * @param Router $router
     */
    protected function registerAdminRoutes(Router $router)
    {
        $router->get(
            'admin',
            function () {

                return redirect(preference('module.users::home_page', 'admin/dashboard'));
            }
        );
    }

    /**
     * Register login routes.
     *
     * @param Router $router
     */
    protected function registerLoginRoutes(Router $router)
    {
        $router->get('admin/login', 'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\LoginController@login');
        $router->post(
            'admin/login',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\LoginController@attempt'
        );
    }

    /**
     * Register the logout route.
     *
     * @param Router $router
     */
    protected function registerLogoutRoutes(Router $router)
    {
        $router->get(
            'admin/logout',
            function () {

                app('auth')->logout();

                return redirect('admin/login');
            }
        );
    }

    /**
     * Register user routes.
     *
     * @param Router $router
     */
    private function registerUserRoutes(Router $router)
    {
        $router->any(
            'admin/users',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\UsersController@index'
        );

        $router->any(
            'admin/users/create',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\UsersController@create'
        );

        $router->any(
            'admin/users/edit/{id}',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\UsersController@edit'
        );
    }

    /**
     * Register role routes.
     *
     * @param $router
     */
    protected function registerRoleRoutes($router)
    {
        $router->any(
            'admin/users/roles',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\RolesController@index'
        );

        $router->any(
            'admin/users/roles/create',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\RolesController@create'
        );

        $router->any(
            'admin/users/roles/edit/{id}',
            'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\RolesController@edit'
        );
    }
}
