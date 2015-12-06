<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\UsersModule\User\Command\BuildCompleteResetForm;
use Anomaly\UsersModule\User\Command\BuildLoginForm;
use Anomaly\UsersModule\User\Command\BuildRegisterForm;
use Anomaly\UsersModule\User\Command\BuildResetForm;
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
                'login_form',
                function (array $parameters = []) {
                    return (new Decorator())->decorate($this->dispatch(new BuildLoginForm($parameters)));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'register_form',
                function (array $parameters = []) {
                    return (new Decorator())->decorate($this->dispatch(new BuildRegisterForm($parameters)));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'reset_form',
                function (array $parameters = []) {
                    return (new Decorator())->decorate($this->dispatch(new BuildResetForm($parameters)));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'complete_reset_form',
                function (array $parameters = []) {
                    return (new Decorator())->decorate($this->dispatch(new BuildCompleteResetForm($parameters)));
                },
                ['is_safe' => ['html']]
            )
        ];
    }
}
