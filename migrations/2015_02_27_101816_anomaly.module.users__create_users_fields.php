<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleUsersCreateUsersFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleUsersCreateUsersFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'email'            => 'anomaly.field_type.email',
        'username'         => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'type' => '_'
            ]
        ],
        'password'         => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'type' => 'password'
            ]
        ],
        'avatar'           => [
            'type'   => 'anomaly.field_type.file',
            'config' => [
                'disk'   => 'public',
                'folder' => 'Users Module/Avatars'
            ]
        ],
        'remember_token'   => 'anomaly.field_type.text',
        'ip_address'       => 'anomaly.field_type.text',
        'last_login_at'    => 'anomaly.field_type.datetime',
        'last_activity_at' => 'anomaly.field_type.datetime',
        'permissions'      => 'anomaly.field_type.checkboxes',
        'display_name'     => 'anomaly.field_type.text',
        'first_name'       => 'anomaly.field_type.text',
        'last_name'        => 'anomaly.field_type.text',
        'name'             => 'anomaly.field_type.text',
        'code'             => 'anomaly.field_type.text',
        'completed'        => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'default_value' => false
            ]
        ],
        'slug'             => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name'
            ]
        ],
        'roles'            => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'related' => 'Anomaly\UsersModule\Role\RoleModel'
            ],
        ],
        'user'             => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\UsersModule\User\UserModel'
            ],
        ]
    ];

}
