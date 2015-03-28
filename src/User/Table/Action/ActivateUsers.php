<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserActivator;

/**
 * Class ActivateUsers
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\Action
 */
class ActivateUsers extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param array                   $selected
     * @param UserRepositoryInterface $users
     * @param UserActivator           $activator
     */
    public function handle(array $selected, UserRepositoryInterface $users, UserActivator $activator)
    {
        $count = 0;

        foreach ($selected as $id) {

            // Try and find the user.
            if (!$user = $users->find($id)) {
                continue;
            }

            // Make sure the user is not activated.
            if ($user->isActivated('admin')) {
                continue;
            }

            $activator->force($user);

            $count++;
        }

        $this->messages->success(trans('module::message.activate_users_success', compact('count')));
    }
}
