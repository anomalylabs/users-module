<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\UsersModule\User\Command\GetLogoutPath;
use Anomaly\UsersModule\User\Command\GetUser;

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
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'user',
                function ($identifier) {
                    return (new Decorator())->decorate($this->dispatch(new GetUser($identifier)));
                }
            ),
            new \Twig_SimpleFunction(
                'role',
                function ($identifier) {
                    return (new Decorator())->decorate($this->dispatch(new GetUser($identifier)));
                }
            ),
            new \Twig_SimpleFunction(
                'logout_path',
                function () {
                    return $this->dispatch(new GetLogoutPath());
                },
                ['is_safe' => ['html']]
            )
        ];
    }
}
