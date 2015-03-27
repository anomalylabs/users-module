<?php namespace Anomaly\UsersModule\User\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class SavePermissions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table\Action
 */
class SavePermissions
{

    /**
     * Handle the action.
     *
     * @param Table                   $table
     * @param UserRepositoryInterface $users
     * @param Request                 $request
     */
    public function handle(Table $table, UserRepositoryInterface $users, Request $request)
    {
        $users->updatePermissions($table->getOption('user'), array_get($_POST, 'permission', []));

        $table->setResponse(redirect($request->fullUrl()));
    }
}
