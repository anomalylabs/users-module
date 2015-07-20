<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\Activation\ActivationManager;
use Anomaly\UsersModule\Activation\Form\ActivationFormBuilder;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Routing\Redirector;

/**
 * Class ActivationsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class ActivationsController extends PublicController
{

    /**
     * Return the form for activating a user.
     *
     * @param ActivationFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(ActivationFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Activate a user.
     *
     * @param UserRepositoryInterface $users
     * @param ActivationManager       $activator
     * @param MessageBag              $messages
     * @param Redirector              $redirect
     * @param                         $username
     * @param                         $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(
        UserRepositoryInterface $users,
        ActivationManager $activator,
        MessageBag $messages,
        Redirector $redirect,
        $user,
        $code
    ) {

        /**
         * If we can't find the user by the ID
         * provided then head back to the form.
         */
        if (!$user = $users->find($user)) {

            $messages->error(trans('anomaly.module.users::message.activate_user_error'));

            return $redirect->to('users/activate');
        }

        /**
         * If we can't successfully activate the
         * provided user then back back to the form.
         */
        if (!$activator->activate($user, $code)) {

            $messages->error(trans('anomaly.module.users::message.activate_user_error'));

            return $redirect->to('users/activate');
        }

        $messages->success(trans('anomaly.module.users::message.activate_user_success'));

        return $redirect->to('/');
    }
}
