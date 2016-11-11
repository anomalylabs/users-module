<?php namespace Anomaly\UsersModule\User\Password;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class ChangePasswordFormHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ChangePasswordFormHandler
{

    /**
     * Handle the form.
     *
     * @param Request $request
     * @param ChangePasswordFormBuilder|ForgotPasswordFormBuilder $builder
     * @param UserRepositoryInterface $users
     * @param MessageBag $messages
     */
    public function handle(
        Request $request,
        ChangePasswordFormBuilder $builder,
        UserRepositoryInterface $users,
        MessageBag $messages
    ) {
        if ($builder->hasFormErrors()) {
            return;
        }

        $user = $request->user();
        $user->password = $builder->getFormValue('password_new');
        $user->save();

        $messages->success('anomaly.module.users::message.confirm_password_change');
    }
}
