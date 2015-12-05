<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\UsersModule\User\Command\BuildCompleteResetForm;
use Anomaly\UsersModule\User\Command\BuildLoginForm;
use Anomaly\UsersModule\User\Command\BuildRegisterForm;
use Anomaly\UsersModule\User\Command\BuildResetForm;
use Anomaly\UsersModule\User\Command\CheckUserPermission;
use Anomaly\UsersModule\User\Command\CheckUserRole;
use Anomaly\UsersModule\User\Command\GetActivatePath;
use Anomaly\UsersModule\User\Command\GetCompleteResetPath;
use Anomaly\UsersModule\User\Command\GetLoginPath;
use Anomaly\UsersModule\User\Command\GetLogoutPath;

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
                'user_has_role',
                function ($identifier) {
                    return $this->dispatch(new CheckUserRole($identifier));
                }
            ),
            new \Twig_SimpleFunction(
                'user_has_permission',
                function ($permission) {
                    return $this->dispatch(new CheckUserPermission($permission));
                }
            ),
            new \Twig_SimpleFunction(
                'login_form',
                function (array $parameters = []) {
                    return $this->dispatch(new BuildLoginForm($parameters));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'register_form',
                function (array $parameters = []) {
                    return $this->dispatch(new BuildRegisterForm($parameters));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'reset_form',
                function (array $parameters = []) {
                    return $this->dispatch(new BuildResetForm($parameters));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'complete_reset_form',
                function (array $parameters = []) {
                    return $this->dispatch(new BuildCompleteResetForm($parameters));
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'login_path',
                function () {
                    return $this->dispatch(new GetLoginPath());
                }
            ),
            new \Twig_SimpleFunction(
                'logout_path',
                function ($redirect = null) {
                    return $this->dispatch(new GetLogoutPath($redirect));
                }
            ),
            new \Twig_SimpleFunction(
                'activate_path',
                function (UserInterface $user) {
                    return $this->dispatch(new GetActivatePath($user));
                }
            ),
            new \Twig_SimpleFunction(
                'complete_reset_path',
                function (UserInterface $user) {
                    return $this->dispatch(new GetCompleteResetPath($user));
                }
            )
        ];
    }
}
