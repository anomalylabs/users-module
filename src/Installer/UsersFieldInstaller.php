<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

class UsersFieldInstaller extends FieldInstaller
{

    /**
     * Fields to install.
     *
     * @var array
     */
    protected $fields = [
        'email'          => [
            'type' => 'email',
        ],
        'username'       => [
            'type' => 'text',
        ],
        'password'       => [
            'type' => 'text',
        ],
        'permissions'    => [
            'type' => 'textarea',
        ],
        'first_name'     => [
            'type' => 'text',
        ],
        'last_name'      => [
            'type' => 'text',
        ],
        'last_action_at' => [
            'type' => 'datetime',
        ],
        'last_login_at'  => [
            'type' => 'datetime',
        ],
        'roles'          => [
            'type'     => 'multiple',
            'settings' => [
                'relation_model' => 'AwesomeModel',
            ],
        ],
        'slug'           => [
            'type' => 'slug',
        ],
        'name'           => [
            'type' => 'text',
        ],
        'user'           => [
            'type'     => 'relationship',
            'settings' => [
                'relation_model' => 'AwesomeModel',
            ],
        ],
        'code'           => [
            'type' => 'text',
        ],
        'is_complete'   => [
            'type' => 'boolean',
        ],
        'completed_at'   => [
            'type' => 'datetime',
        ],
        'type'           => [
            'type' => 'text', // TODO: Extension field type?
        ],
        'ip_address'     => [
            'type' => 'text',
        ],
    ];

}
