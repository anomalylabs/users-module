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
     * The module middleware.
     *
     * @var array
     */
    protected $middleware = [
        'Anomaly\UsersModule\Http\Middleware\AuthorizeModuleAccess',
        'Anomaly\UsersModule\Http\Middleware\AuthorizeRoutePermission'
    ];

    /**
     * The addon event listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\UsersModule\User\Event\UserWasLoggedIn'                  => [
            'Anomaly\UsersModule\User\Listener\TouchLastLogin'
        ],
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded' => [
            'Anomaly\UsersModule\User\Listener\TouchLastActivity'
        ]
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'App\Http\Middleware\Authenticate' => 'Anomaly\UsersModule\Http\Middleware\AuthenticateRequest'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin'                              => 'Anomaly\UsersModule\Http\Controller\Admin\HomeController@index',
        'auth/login'                         => 'Anomaly\UsersModule\Http\Controller\Admin\LoginController@logout',
        'auth/logout'                        => 'Anomaly\UsersModule\Http\Controller\Admin\LogoutController@logout',
        'admin/login'                        => 'Anomaly\UsersModule\Http\Controller\Admin\LoginController@login',
        'admin/logout'                       => 'Anomaly\UsersModule\Http\Controller\Admin\LoginController@logout',
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
        'admin/users/fields/create/{type?}'  => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@create',
        'admin/users/fields/edit/{id}'       => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@edit',
        'admin/users/settings'               => 'Anomaly\UsersModule\Http\Controller\Admin\SettingsController@edit',
        'users/activate'                     => 'Anomaly\UsersModule\Http\Controller\ActivationsController@form',
        'users/activate/{username}/{code}'   => 'Anomaly\UsersModule\Http\Controller\ActivationsController@activate',
        'login'                              => 'Anomaly\UsersModule\Http\Controller\LoginController@login',
        'logout'                             => 'Anomaly\UsersModule\Http\Controller\LoginController@logout'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\UsersModule\User\Contract\UserRepositoryInterface'               => 'Anomaly\UsersModule\User\UserRepository',
        'Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface'               => 'Anomaly\UsersModule\Role\RoleRepository',
        'Anomaly\UsersModule\Reset\Contract\ResetRepositoryInterface'             => 'Anomaly\UsersModule\Reset\ResetRepository',
        'Anomaly\UsersModule\Activation\Contract\ActivationRepositoryInterface'   => 'Anomaly\UsersModule\Activation\ActivationRepository',
        'Anomaly\UsersModule\Suspension\Contract\SuspensionRepositoryInterface'   => 'Anomaly\UsersModule\Suspension\SuspensionRepository',
        'Anomaly\UsersModule\Persistence\Contract\PersistenceRepositoryInterface' => 'Anomaly\UsersModule\Persistence\PersistenceRepository'
    ];

}
