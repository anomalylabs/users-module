<?php namespace Anomaly\UsersModule\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class UsersFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Installer
 */
class UsersFieldInstaller extends FieldInstaller
{

    /**
     * Stream fields to install.
     *
     * @var array
     */
    protected $fields = [
        'email'            => 'email',
        'username'         => 'text',
        'password'         => 'Anomaly\UsersModule\Addon\FieldType\PasswordTextFieldType',
        'ip_address'       => 'text',
        'remember_token'   => 'text',
        'last_login_at'    => 'datetime',
        'last_activity_at' => 'datetime',
        'activated'        => 'boolean',
        'activated_at'     => 'datetime',
        'activation_code'  => 'text',
        'blocked'          => 'boolean',
        'blocked_at'       => 'datetime',
        'permissions'      => 'checkboxes',
        'display_name'     => 'text',
        'first_name'       => 'text',
        'last_name'        => 'text',
        'website'          => 'url',
        'name'             => 'text',
        'slug'             => 'slug',
        'roles'            => [
            'type'   => 'multiple',
            'config' => [
                'pivot_table' => 'users_assigned_roles',
                'related'     => 'Anomaly\UsersModule\Role\RoleModel',
            ],
        ],
        'user'             => [
            'type'   => 'relationship',
            'config' => [
                'related' => 'Anomaly\UsersModule\User\UserModel',
            ],
        ],
    ];

}
