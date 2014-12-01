<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

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
     * The controller namespace prefix for this addon.
     *
     * @var string
     */
    protected $prefix = 'Anomaly\Streams\Addon\Module\Users\Http\Controller\\';

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->registerAdminRoutes();
        $this->registerLoginRoutes();
        $this->registerLogoutRoutes();

        $this->registerUserRoutes();
        $this->registerRoleRoutes();
    }

    /**
     * Register admin routes.
     */
    protected function registerAdminRoutes()
    {
        app('router')->get(
            'admin',
            function () {

                return redirect(preference('module.users::home_page', 'admin/dashboard'));
            }
        );
    }

    /**
     * Register login routes.
     */
    protected function registerLoginRoutes()
    {
        app('router')->get(
            'admin/login',
            $this->prefix . 'Admin\LoginController@login'
        );
        app('router')->post(
            'admin/login',
            $this->prefix . 'Admin\LoginController@attempt'
        );
    }

    /**
     * Register the logout route.
     */
    protected function registerLogoutRoutes()
    {
        app('router')->get(
            'admin/logout',
            function () {

                app('streams.auth')->logout();

                return redirect('admin/login');
            }
        );
    }

    /**
     * Register user routes.
     */
    private function registerUserRoutes()
    {
        app('router')->any('admin/users', $this->prefix . 'Admin\UsersController@index');
        app('router')->any('admin/users/create', $this->prefix . 'Admin\UsersController@create');
        app('router')->any('admin/users/edit/{id}', $this->prefix . 'Admin\UsersController@edit');
        app('router')->any('admin/users/activate/{id}', $this->prefix . 'Admin\UsersController@activate');
        app('router')->any('admin/users/deactivate/{id}', $this->prefix . 'Admin\UsersController@deactivate');
        app('router')->any('admin/users/block/{id}', $this->prefix . 'Admin\UsersController@block');
        app('router')->any('admin/users/unblock/{id}', $this->prefix . 'Admin\UsersController@unblock');
        app('router')->any('admin/users/logout/{id}', $this->prefix . 'Admin\UsersController@logout');
    }

    /**
     * Register role routes.
     */
    protected function registerRoleRoutes()
    {
        app('router')->any('admin/users/roles', $this->prefix . 'Admin\RolesController@index');
        app('router')->any('admin/users/roles/create', $this->prefix . 'Admin\RolesController@create');
        app('router')->any('admin/users/roles/edit/{id}', $this->prefix . 'Admin\RolesController@edit');
    }
}
