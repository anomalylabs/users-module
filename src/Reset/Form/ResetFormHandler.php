<?php namespace Anomaly\UsersModule\Reset\Form;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\Reset\ResetManager;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Routing\Redirector;

/**
 * Class ResetFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Form
 */
class ResetFormHandler
{

    /**
     * Handle the form.
     *
     * @param ResetFormBuilder $builder
     * @param Redirector       $redirect
     */
    public function handle(
        UserRepositoryInterface $users,
        ResetFormBuilder $builder,
        MessageBag $messages,
        ResetManager $manager,
        Redirector $redirect
    ) {
        $user = $users->findByEmail($builder->getFormValue('email'));

        /**
         * If we can't find the user by the email
         * provided then head back to the form.
         */
        if (!$user) {

            $messages->error(trans('anomaly.module.users::message.reset_password_error'));

            $builder->setFormResponse($redirect->to('users/reset'));

            return;
        }

        /**
         * If we can't successfully reset the
         * provided user then back back to the form.
         */
        if (!$manager->complete($user, $builder->getFormValue('code'), $builder->getFormValue('password'))) {

            $messages->error(trans('anomaly.module.users::message.reset_password_error'));

            $builder->setFormResponse($redirect->to('users/reset'));

            return;
        }

        $messages->success(trans('anomaly.module.users::message.reset_password_success'));

        $builder->setFormResponse($redirect->to('/'));
    }
}
