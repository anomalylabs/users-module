<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Anomaly\Streams\Addon\Module\Users\Login\LoginService;

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
        'auth' => 'Anomaly\Streams\Addon\Module\Users\Middleware\Authenticator',
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
    public function map()
    {
        $this->registerAdminRoutes();
        $this->registerLoginRoutes();
        $this->registerLogoutRoutes();

        $this->registerUsersRoutes();
    }

    protected function registerAdminRoutes()
    {
        get(
            'admin',
            function () {

                return redirect(preference('module.users::home_page', 'admin/dashboard'));

            }
        );
    }

    protected function registerLoginRoutes()
    {
        get('admin/login', 'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\LoginController@login');
        post('admin/login', 'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\LoginController@attempt');
    }

    protected function registerLogoutRoutes()
    {
        get(
            'admin/logout',
            function (LoginService $login) {

                $login->logout();

                return redirect('admin/login');

            }
        );
    }

    private function registerUsersRoutes()
    {
        get('admin/users', 'Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin\UsersController@index');
    }

}
