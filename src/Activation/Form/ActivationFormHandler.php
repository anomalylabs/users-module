<?php namespace Anomaly\UsersModule\Activation\Form;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\Activation\ActivationManager;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Routing\Redirector;

/**
 * Class ActivationFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Form
 */
class ActivationFormHandler
{

    /**
     * Handle the form.
     *
     * @param ActivationFormBuilder $builder
     * @param Redirector            $redirect
     */
    public function handle(
        UserRepositoryInterface $users,
        ActivationFormBuilder $builder,
        MessageBag $messages,
        ActivationManager $activator,
        Redirector $redirect
    ) {
        $user = $users->findByEmail($builder->getFormValue('email'));

        /**
         * If we can't find the user by the email
         * provided then head back to the form.
         */
        if (!$user) {

            $messages->error(trans('anomaly.module.users::error.activate_user'));

            $builder->setFormResponse($redirect->to('users/activate'));

            return;
        }

        /**
         * If the user is already activated then
         * send them to the home page.
         */
        if ($user->isActivated()) {

            $messages->success(trans('anomaly.module.users::message.user_already_activated'));

            $builder->setFormResponse($redirect->to('/'));

            return;
        }

        /**
         * If we can't successfully activate the
         * provided user then back back to the form.
         */
        if (!$activator->activate($user, $builder->getFormValue('code'))) {

            $messages->error(trans('anomaly.module.users::error.activate_user'));

            $builder->setFormResponse($redirect->to('users/activate'));

            return;
        }

        $messages->success(trans('anomaly.module.users::success.activate_user'));

        $builder->setFormResponse($redirect->to('/'));
    }
}
