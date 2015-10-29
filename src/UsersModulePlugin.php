<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\UsersModule\User\Command\BuildLoginForm;
use Anomaly\UsersModule\User\Command\BuildResetForm;

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
                'login_form',
                function ($redirect = '/', array $parameters = []) {

                    array_set($parameters, 'options.redirect', $redirect);

                    return $this->dispatch(new BuildLoginForm($parameters));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'password_reset_form',
                function ($redirect = '/', array $parameters = []) {

                    array_set($parameters, 'options.redirect', $redirect);

                    return $this->dispatch(new BuildResetForm($parameters));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'logout_path',
                function ($redirect = '/') {
                    return '/logout?redirect=' . $redirect;
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'logged_in',
                function () {
                    return app('auth')->check();
                }
            ),
        ];
    }
}
