<?php namespace Anomaly\UsersModule\Role\Plugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\UsersModule\Role\Plugin\Command\GetRole;

/**
 * Class RolePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Plugin
 */
class RolePlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'role',
                function ($identifier = null) {
                    return $this->dispatch(new GetRole($identifier));
                }
            )
        ];
    }
}
