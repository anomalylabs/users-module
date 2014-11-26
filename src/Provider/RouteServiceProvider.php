<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
 */
class RouteServiceProvider extends \Anomaly\Streams\Platform\Provider\RouteServiceProvider
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
        'streams.auth' => 'Anomaly\Streams\Addon\Module\Users\Http\Middleware\CheckAuthentication',
    ];

    /**
     * Called before routes are registered.
     * Register any model bindings or pattern based filters.
     *
     * @param Router $router
     * @return void
     */
    public function before(Router $router)
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
        $router->when('admin*', 'streams.auth');

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

                app('streams.auth')->logout();

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
        $routes = [
            'any::admin/users'                 => 'Admin\UsersController@index',
            'any::admin/users/create'          => 'Admin\UsersController@create',
            'any::admin/users/edit/{id}'       => 'Admin\UsersController@edit',
            'get::admin/users/activate/{id}'   => 'Admin\UsersController@activate',
            'get::admin/users/deactivate/{id}' => 'Admin\UsersController@deactivate',
            'get::admin/users/block/{id}'      => 'Admin\UsersController@block',
            'get::admin/users/unblock/{id}'    => 'Admin\UsersController@unblock',
            'get::admin/users/logout/{id}'     => 'Admin\UsersController@logout',
        ];

        $this->route($router, $routes);
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
