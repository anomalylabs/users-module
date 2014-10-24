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
        'email'            => [
            'type' => 'email',
        ],
        'username'         => [
            'type' => 'email',
        ],
        'password'         => [
            'type' => 'text',
        ],
        'permissions'      => [
            'type' => 'textarea',
        ],
        'first_name'       => [
            'type' => 'text',
        ],
        'last_name'        => [
            'type' => 'text',
        ],
        'last_activity_at' => [
            'type' => 'datetime',
        ],
        'roles'            => [
            'type'     => 'multiple',
            'settings' => [
                'relation_model' => 'AwesomeModel',
            ],
        ],
        'slug'             => [
            'type' => 'slug',
        ],
        'name'             => [
            'type' => 'text',
        ],
    ];

}
