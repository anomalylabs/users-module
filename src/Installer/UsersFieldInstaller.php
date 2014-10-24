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
        /**
         * Users Fields
         */
        'email'            => [
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
        /**
         * Roles Fields
         */
        'slug'             => [
            'type' => 'slug',
        ],
        'name'             => [
            'type' => 'text',
        ],
        /**
         * Flags Fields
         */
        'flag_type'        => [
            'type' => 'text',
        ],
        'is_flagged'       => [
            'type' => 'boolean',
        ],
        /**
         * Tokens Fields
         */
        'token_type'       => [
            'type' => 'text',
        ],
        'token'            => [
            'type' => 'text',
        ],
    ];

}
