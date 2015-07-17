<?php namespace Anomaly\UsersModule\User\Login;

use Illuminate\Auth\Guard;
use Illuminate\Routing\Redirector;

/**
 * Class LoginFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Login
 */
class LoginFormHandler
{

    /**
     * Handle the form.
     *
     * @param LoginFormBuilder $builder
     * @param Guard            $guard
     */
    public function handle(LoginFormBuilder $builder, Redirector $redirect, Guard $guard)
    {
        $guard->login($builder->getUser());

        $builder->setFormResponse($redirect->to('/'));
    }
}
