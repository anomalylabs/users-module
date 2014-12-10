<?php namespace Anomaly\Streams\Addon\Module\Users;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class UsersModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users
 */
class UsersModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'UsersFieldInstaller',
        'UsersStreamInstaller',
        'RolesStreamInstaller',
        'ProfilesStreamInstaller',
    ];
}
 