<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\Reset\Form\ResetFormBuilder;

/**
 * Class ResetsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class ResetsController extends PublicController
{

    /**
     * Return the form for resetting a user's password.
     *
     * @param ResetFormBuilder $form
     * @param null             $code
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(ResetFormBuilder $form, $code = null)
    {
        return $form->setCode($code)->render();
    }
}
