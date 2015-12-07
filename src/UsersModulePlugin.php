<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\Ui\Form\Command\GetFormCriteria;
use Anomaly\UsersModule\User\Command\BuildRegisterForm;
use Anomaly\UsersModule\User\Command\BuildResetForm;
use Anomaly\UsersModule\User\Command\GetLoginForm;
use Anomaly\UsersModule\User\Command\GetLogoutPath;
use Anomaly\UsersModule\User\Command\GetUser;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;
use Anomaly\UsersModule\User\Reset\CompleteResetFormBuilder;
use Anomaly\UsersModule\User\Reset\ResetFormBuilder;

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
            ),
            new \Twig_SimpleFunction(
                'login_form',
                function () {
                    return (new Decorator())->decorate(
                        $this->dispatch(new GetFormCriteria(LoginFormBuilder::class))
                    );
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'register_form',
                function () {
                    return (new Decorator())->decorate(
                        $this->dispatch(new GetFormCriteria(RegisterFormBuilder::class))
                    );
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'reset_form',
                function () {
                    return (new Decorator())->decorate(
                        $this->dispatch(new GetFormCriteria(ResetFormBuilder::class))
                    );
                },
                ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'complete_reset_form',
                function () {
                    return (new Decorator())->decorate(
                        $this->dispatch(new GetFormCriteria(CompleteResetFormBuilder::class))
                    );
                },
                ['is_safe' => ['html']]
            )
        ];
    }
}
