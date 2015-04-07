<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class UsersModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\UsersModule\UsersModulePlugin'
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\UsersModule\User\UserModel'                        => 'Anomaly\UsersModule\User\UserModel',
        'Anomaly\UsersModule\Role\RoleModel'                        => 'Anomaly\UsersModule\Role\RoleModel',
        'Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel' => 'Anomaly\UsersModule\User\UserModel',
        'Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel' => 'Anomaly\UsersModule\Role\RoleModel',
        'App\Http\Middleware\Authenticate'                          => 'Anomaly\UsersModule\Http\Middleware\Authenticate'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\UsersModule\User\Contract\UserRepositoryInterface' => 'Anomaly\UsersModule\User\UserRepository',
        'Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface' => 'Anomaly\UsersModule\Role\RoleRepository'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin'                              => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@home',
        'auth/login'                         => 'Anomaly\UsersModule\Http\Controller\Admin\LogoutController@logout',
        'auth/logout'                        => 'Anomaly\UsersModule\Http\Controller\Admin\LogoutController@logout',
        'admin/login'                        => 'Anomaly\UsersModule\Http\Controller\Admin\LoginController@login',
        'admin/logout'                       => 'Anomaly\UsersModule\Http\Controller\Admin\LogoutController@logout',
        'admin/users'                        => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@index',
        'admin/users/create'                 => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@create',
        'admin/users/edit/{id}'              => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@edit',
        'admin/users/delete/{id}'            => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@delete',
        'admin/users/permissions/{id}'       => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@permissions',
        'admin/users/activate/{id}'          => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@activate',
        'admin/users/deactivate/{id}'        => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@deactivate',
        'admin/users/block/{id}'             => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@block',
        'admin/users/unblock/{id}'           => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@unblock',
        'admin/users/logout/{id}'            => 'Anomaly\UsersModule\Http\Controller\Admin\UsersController@logout',
        'admin/users/roles'                  => 'Anomaly\UsersModule\Http\Controller\Admin\RolesController@index',
        'admin/users/roles/create'           => 'Anomaly\UsersModule\Http\Controller\Admin\RolesController@create',
        'admin/users/roles/edit/{id}'        => 'Anomaly\UsersModule\Http\Controller\Admin\RolesController@edit',
        'admin/users/roles/permissions/{id}' => 'Anomaly\UsersModule\Http\Controller\Admin\RolesController@permissions',
        'admin/users/fields'                 => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@index',
        'admin/users/fields/create/{type}'   => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@create',
        'admin/users/fields/edit/{id}'       => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@edit',
        'admin/users/settings'               => 'Anomaly\UsersModule\Http\Controller\Admin\SettingsController@edit'
    ];

}
