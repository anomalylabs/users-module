<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\Reset\ResetMailer;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class ResetPasswordHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\Action
 */
class ResetPasswordHandler extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param UserRepositoryInterface $users
     * @param ResetMailer             $mailer
     * @param                         $selected
     */
    public function handle(UserRepositoryInterface $users, ResetMailer $mailer, $selected)
    {
        $error   = 0;
        $success = 0;

        foreach ($selected as $id) {

            $user = $users->find($id);

            if ($user && $mailer->send($user)) {
                $success += 1;
            } else {
                $error += 1;
            }
        }

        if ($success) {
            $this->messages->success(
                trans('anomaly.module.users::message.reset_passwords_success', ['count' => $success])
            );
        }

        if ($error) {
            $this->messages->error(
                trans('anomaly.module.users::message.reset_passwords_error', ['count' => $error])
            );
        }
    }
}
