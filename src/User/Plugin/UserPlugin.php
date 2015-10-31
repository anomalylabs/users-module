<?php namespace Anomaly\UsersModule\User\Plugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Plugin\Command\BuildCompleteResetForm;
use Anomaly\UsersModule\User\Plugin\Command\BuildLoginForm;
use Anomaly\UsersModule\User\Plugin\Command\BuildRegisterForm;
use Anomaly\UsersModule\User\Plugin\Command\BuildResetForm;
use Anomaly\UsersModule\User\Plugin\Command\GetActivatePath;
use Anomaly\UsersModule\User\Plugin\Command\GetCompleteResetPath;
use Anomaly\UsersModule\User\Plugin\Command\GetLoginPath;
use Anomaly\UsersModule\User\Plugin\Command\GetLogoutPath;
use Anomaly\UsersModule\User\Plugin\Command\GetUser;

/**
 * Class UserPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Plugin
 */
class UserPlugin extends Plugin
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
                function ($identifier = null) {
                    return $this->dispatch(new GetUser($identifier));
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
