<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\Activation\ActivationManager;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class ActivateHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\Action
 */
class ActivateHandler extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param UserRepositoryInterface $users
     * @param ActivationManager       $activator
     * @param                         $selected
     */
    public function handle(UserRepositoryInterface $users, ActivationManager $activator, $selected)
    {
        foreach ($selected as $id) {
            $activator->force($users->find($id));
        }

        $this->messages->success(trans('anomaly.module.users::message.activate_users_success', ['count' => count($selected)]));
    }
}
