<?php namespace Anomaly\UsersModule\Role;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class RoleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role
 */
class RoleRouteProvider extends RouteServiceProvider
{

    /**
     * Map routes for roles.
     */
    public function map(Router $router)
    {
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
    }
}
