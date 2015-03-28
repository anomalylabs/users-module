<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserBlocker;

/**
 * Class BlockUsers
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\Action
 */
class BlockUsers extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param array                   $selected
     * @param UserRepositoryInterface $users
     * @param UserBlocker             $blocker
     */
    public function handle(array $selected, UserRepositoryInterface $users, UserBlocker $blocker)
    {
        $count = 0;

        foreach ($selected as $id) {

            // Try and find the user.
            if (!$user = $users->find($id)) {
                continue;
            }

            // Make sure the user it not admin.
            if ($user->hasRole('admin')) {
                continue;
            }

            $blocker->block($user);

            $count++;
        }

        $this->messages->success(trans('module::message.block_users_success', compact('count')));
    }
}
