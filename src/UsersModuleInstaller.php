<?php namespace Anomaly\Streams\Addon\Module\Users;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

class UsersModuleInstaller extends ModuleInstaller
{
    /**
     * Installers to run in order to install this module.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\Streams\Addon\Module\Users\Installer\UsersFieldInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\UsersStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\RolesStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\FlagsStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\TokensStreamInstaller',
    ];
}
 