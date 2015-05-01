<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Table\UserPermissionTableBuilder;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class SavePermissions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table\Action
 */
class SavePermissions extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param UserPermissionTableBuilder $builder
     * @param UserRepositoryInterface    $users
     * @param Redirector                 $redirector
     * @param Request                    $request
     */
    public function handle(
        UserPermissionTableBuilder $builder,
        UserRepositoryInterface $users,
        Redirector $redirector,
        Request $request
    ) {
        $user = $builder->getUser();

        $users->updatePermissions($user, array_get($_POST, 'permission', []));

        $builder->setTableResponse($redirector->to($request->fullUrl()));

        $this->messages->success(
            trans('module::message.save_user_permissions_success', ['username' => $user->getUsername()])
        );
    }
}
