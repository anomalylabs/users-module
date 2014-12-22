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
        /**
         * The default admin route leads to
         * the preferred landing page.
         */
        app('router')->get(
            'admin',
            function () {

                return redirect('admin/dashboard');
            }
        );

        /**
         * Since laravel points to these by default
         * let's just ping back to what we expect (admin).
         */
        app('router')->get(
            'auth/login',
            function () {

                return redirect('admin/login');
            }
        );

        /**
         * Handle logging into the admin.
         */
        app('router')->get('admin/login', $this->prefix . 'Admin\LoginController@login');
        app('router')->post('admin/login', $this->prefix . 'Admin\LoginController@attempt');

        /**
         * Handle logging out.
         */
        app('router')->get(
            'admin/logout',
            function () {

                app('auth')->logout();

                return redirect('auth/login');
            }
        );

        /**
         * Route the UsersController routes.
         */
        app('router')->any('admin/users', $this->prefix . 'Admin\UsersController@index');
        app('router')->any('admin/users/create', $this->prefix . 'Admin\UsersController@create');
        app('router')->any('admin/users/edit/{id}', $this->prefix . 'Admin\UsersController@edit');
        app('router')->any('admin/users/activate/{id}', $this->prefix . 'Admin\UsersController@activate');
        app('router')->any('admin/users/deactivate/{id}', $this->prefix . 'Admin\UsersController@deactivate');
        app('router')->any('admin/users/block/{id}', $this->prefix . 'Admin\UsersController@block');
        app('router')->any('admin/users/unblock/{id}', $this->prefix . 'Admin\UsersController@unblock');
        app('router')->any('admin/users/logout/{id}', $this->prefix . 'Admin\UsersController@logout');

        /**
         * Route the RolesController routes.
         */
        app('router')->any('admin/users/roles', $this->prefix . 'Admin\RolesController@index');
        app('router')->any('admin/users/roles/create', $this->prefix . 'Admin\RolesController@create');
        app('router')->any('admin/users/roles/edit/{id}', $this->prefix . 'Admin\RolesController@edit');
    }
}
