<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class UsersFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Installer
 */
class UsersFieldInstaller extends FieldInstaller
{

    /**
     * Stream fields to install.
     *
     * @var array
     */
    protected $fields = [
        /**
         * User fields.
         */
        'email'            => 'email',
        'username'         => 'text',
        'password'         => 'Anomaly\Streams\Addon\Module\Users\Addon\FieldType\PasswordTextFieldType',
        'ip_address'       => 'text',
        'last_activity_at' => 'datetime',
        'last_login_at'    => 'datetime',
        'roles'            => [
            'type'   => 'multiple',
            'config' => [
                'related' => 'AwesomeModel',
            ],
        ],
        /**
         * Profile fields.
         */
        'display_name'     => 'text',
        'first_name'       => 'text',
        'last_name'        => 'text',
        'website'          => 'url',
        /**
         * Role fields.
         */
        'name'             => 'text',
        'slug'             => 'slug',
        'permissions'      => 'checkboxes',
        'user'             => [
            'type'   => 'relationship',
            'config' => [
                'related' => 'AwesomeModel',
            ],
        ],
        /**
         * Activation / block / etc fields.
         */
        'code'             => 'text',
        'is_complete'      => 'boolean',
        'completed_at'     => 'datetime',
        'type'             => 'text',
    ];
}
