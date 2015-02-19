<?php namespace Anomaly\UsersModule\Permission\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
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
     * @param Table          $table
     * @param RoleRepositoryInterface $roles
     * @param Request        $request
     */
    public function handle(Table $table, RoleRepositoryInterface $roles, Request $request)
    {
        $roles->updatePermissions($table->getOption('role'), array_get($_POST, 'permission', []));

        $table->setResponse(redirect($request->fullUrl()));
    }
}
