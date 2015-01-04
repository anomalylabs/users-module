<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class UsersModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\UsersModule\Installer\UsersFieldInstaller',
        'Anomaly\UsersModule\Installer\UsersStreamInstaller',
        'Anomaly\UsersModule\Installer\RolesStreamInstaller',
        'Anomaly\UsersModule\Installer\ProfilesStreamInstaller',
    ];
}
