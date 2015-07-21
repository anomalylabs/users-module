<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Register\RegisterFormBuilder;

/**
 * Class RegisterController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class RegisterController extends PublicController
{

    /**
     * Return the form for users to register.
     *
     * @param RegisterFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(RegisterFormBuilder $form)
    {
        return $form->render();
    }
}
