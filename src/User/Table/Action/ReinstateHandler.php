<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\Suspension\SuspensionManager;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class ReinstateHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\Action
 */
class ReinstateHandler extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param UserRepositoryInterface $users
     * @param SuspensionManager       $reinstater
     * @param                         $selected
     */
    public function handle(UserRepositoryInterface $users, SuspensionManager $reinstater, $selected)
    {
        foreach ($selected as $id) {
            $reinstater->reinstate($users->find($id));
        }

        $this->messages->success(
            trans('anomaly.module.users::message.reinstate_users_success', ['count' => count($selected)])
        );
    }
}
