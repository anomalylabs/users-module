<?php namespace Anomaly\UsersModule\Permission;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PermissionRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission
 */
class PermissionRouteProvider extends RouteServiceProvider
{

    /**
     * Map routes for permissions.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/users/permissions/{id}',
            'Anomaly\UsersModule\Http\Controller\Admin\PermissionsController@index'
        );
    }
}
