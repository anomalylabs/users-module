<?php namespace Anomaly\UsersModule\User;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class UserRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserRouteProvider extends RouteServiceProvider
{

    /**
     * Map routes for users.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
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
    }
}
