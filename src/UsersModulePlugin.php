<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class UsersModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModulePlugin extends Plugin
{

    /**
     * The plugin functions.
     *
     * @var UsersModulePluginFunctions
     */
    protected $functions;

    /**
     * Create a new UsersModulePlugin instance.
     *
     * @param UsersModulePluginFunctions $functions
     */
    public function __construct(UsersModulePluginFunctions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Get plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('users_roles', [$this->functions, 'roles']),
        ];
    }
}
