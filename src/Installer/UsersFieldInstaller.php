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
        'email'            => 'anomaly.field_type.email',
        'username'         => 'anomaly.field_type.text',
        'password'         => 'Anomaly\UsersModule\Addon\FieldType\PasswordTextFieldType',
        'ip_address'       => 'anomaly.field_type.text',
        'remember_token'   => 'anomaly.field_type.text',
        'last_login_at'    => 'anomaly.field_type.datetime',
        'last_activity_at' => 'anomaly.field_type.datetime',
        'activated'        => 'anomaly.field_type.boolean',
        'activated_at'     => 'anomaly.field_type.datetime',
        'activation_code'  => 'anomaly.field_type.text',
        'blocked'          => 'anomaly.field_type.boolean',
        'blocked_at'       => 'anomaly.field_type.datetime',
        'permissions'      => 'anomaly.field_type.checkboxes',
        'display_name'     => 'anomaly.field_type.text',
        'first_name'       => 'anomaly.field_type.text',
        'last_name'        => 'anomaly.field_type.text',
        'website'          => 'anomaly.field_type.url',
        'name'             => 'anomaly.field_type.text',
        'slug'             => 'anomaly.field_type.slug',
        'roles'            => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'pivot_table' => 'users_assigned_roles',
                'related'     => 'Anomaly\UsersModule\Role\RoleModel',
            ],
        ],
        'user'             => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\UsersModule\User\UserModel',
            ],
        ],
    ];

}
