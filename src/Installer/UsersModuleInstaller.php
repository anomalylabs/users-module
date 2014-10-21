<?php namespace Anomaly\Streams\Module\Users\Installer;

use Streams\Core\Addon\Installer\ModuleInstallerAbstractAbstract;

class UsersModuleInstallerAbstract extends ModuleInstallerAbstractAbstract
{
    /**
     * The stream fields definitions.
     *
     * @var array
     */
    protected $fields = [
        'email'               => [
            'type' => 'email',
        ],
        'password'            => [
            'type' => 'text',
        ],
        'permissions'         => [
            'type' => 'textarea',
        ],
        'is_activated'        => [
            'type' => 'boolean',
        ],
        'activation_code'     => [
            'type' => 'text',
        ],
        'activated_at'        => [
            'type' => 'datetime',
        ],
        'last_login'          => [
            'type' => 'datetime',
        ],
        'persist_code'        => [
            'type' => 'text',
        ],
        'reset_password_code' => [
            'type' => 'text',
        ],
        'first_name'          => [
            'type' => 'text',
        ],
        'last_name'           => [
            'type' => 'text',
        ],
        'groups'              => [
            'type'     => 'multiple',
            'settings' => [
                'relation' => 'Addon\Module\Users\Model\GroupEntryModel',
            ],
        ],
        'name'                => [
            'type' => 'text',
        ],
        'user'                => [
            'type'     => 'relationship',
            'settings' => [
                'relation' => 'Addon\Module\Users\Model\UserEntryModel',
            ],
        ],
        'group'               => [
            'type'     => 'relationship',
            'settings' => [
                'relation' => 'Addon\Module\Users\Model\GroupEntryModel',
            ],
        ],
        'ip_address'          => [
            'type' => 'text',
        ],
        'attempts'            => [
            'type' => 'integer',
        ],
        'suspended'           => [
            'type' => 'boolean',
        ],
        'banned'              => [
            'type' => 'boolean',
        ],
        'last_attempt_at'     => [
            'type' => 'datetime',
        ],
        'suspended_at'        => [
            'type' => 'datetime',
        ],
        'banned_at'           => [
            'type' => 'datetime',
        ],
    ];
}
