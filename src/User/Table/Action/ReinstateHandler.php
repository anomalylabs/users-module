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
     * @param SuspensionManager       $manager
     * @param                         $selected
     */
    public function handle(UserRepositoryInterface $users, SuspensionManager $manager, $selected)
    {
        foreach ($selected as $id) {
            $manager->reinstate($users->find($id));
        }

        $this->messages->success(
            trans('anomaly.module.users::success.reinstate_users', ['count' => count($selected)])
        );
    }
}
