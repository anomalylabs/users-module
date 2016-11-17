<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class UsersModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UsersModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\UsersModule\UsersModulePlugin',
    ];

    /**
     * The module middleware.
     *
     * @var array
     */
    protected $middleware = [
        'Anomaly\UsersModule\Http\Middleware\CheckSecurity',
        'Anomaly\UsersModule\Http\Middleware\AuthorizeRouteRoles',
        'Anomaly\UsersModule\Http\Middleware\AuthorizeModuleAccess',
        'Anomaly\UsersModule\Http\Middleware\AuthorizeControlPanel',
        'Anomaly\UsersModule\Http\Middleware\AuthorizeRoutePermission',
    ];

    /**
     * The addon event listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\UsersModule\User\Event\UserWasLoggedIn'                  => [
            'Anomaly\UsersModule\User\Listener\TouchLastLogin',
        ],
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded' => [
            'Anomaly\UsersModule\User\Listener\TouchLastActivity',
        ],
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        '@{username}'                        => [
            'as'   => 'anomaly.module.users::users.view',
            'uses' => 'Anomaly\UsersModule\Http\Controller\UsersController@view',
        ],
        'login'                              => [
            'as'   => 'anomaly.module.users::login',
            'uses' => 'Anomaly\UsersModule\Http\Controller\LoginController@login',
        ],
        'logout'                             => [
            'as'   => 'anomaly.module.users::logout',
            'uses' => 'Anomaly\UsersModule\Http\Controller\LoginController@logout',
        ],
        'register'                           => [
            'as'   => 'anomaly.module.users::register',
            'uses' => 'Anomaly\UsersModule\Http\Controller\RegisterController@register',
        ],
        'users/activate'                     => [
            'as'   => 'anomaly.module.users::users.activate',
            'uses' => 'Anomaly\UsersModule\Http\Controller\RegisterController@activate',
        ],
        'users/password/reset'               => [
            'as'   => 'anomaly.module.users::users.reset',
            'uses' => 'Anomaly\UsersModule\Http\Controller\PasswordController@reset',
        ],
        'users/password/forgot'              => [
            'as'   => 'anomaly.module.users::password.forgot',
            'uses' => 'Anomaly\UsersModule\Http\Controller\PasswordController@forgot',
        ],
        'admin'                              => 'Anomaly\UsersModule\Http\Controller\Admin\HomeController@index',
        'auth/login'                         => 'Anomaly\UsersModule\Http\Controller\Admin\LoginController@logout',
        'auth/logout'                        => 'Anomaly\UsersModule\Http\Controller\Admin\LoginController@logout',
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
        'admin/users/fields/choose'          => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@choose',
        'admin/users/fields/create'          => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@create',
        'admin/users/fields/edit/{id}'       => 'Anomaly\UsersModule\Http\Controller\Admin\FieldsController@edit',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'login'                                                     => 'Anomaly\UsersModule\User\Login\LoginFormBuilder',
        'register'                                                  => 'Anomaly\UsersModule\User\Register\RegisterFormBuilder',
        'reset_password'                                            => 'Anomaly\UsersModule\User\Password\ResetPasswordFormBuilder',
        'forgot_password'                                           => 'Anomaly\UsersModule\User\Password\ForgotPasswordFormBuilder',
        'Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel' => 'Anomaly\UsersModule\User\UserModel',
        'Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel' => 'Anomaly\UsersModule\Role\RoleModel',
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
        'Anomaly\UsersModule\Persistence\Contract\PersistenceRepositoryInterface' => 'Anomaly\UsersModule\Persistence\PersistenceRepository',
        'Anomaly\UsersModule\Authenticator\Authenticator'                         => 'Anomaly\UsersModule\Authenticator\Authenticator',
    ];
}
