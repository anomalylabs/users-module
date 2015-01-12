<?php namespace Anomaly\UsersModule\Permission\Table\Action\Handler;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class SaveActionHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table\Action\Handler
 */
class SaveActionHandler
{

    /**
     * Handle the action.
     */
    public function handle(Table $table, Request $request, RoleRepositoryInterface $roles)
    {
        $options = $table->getOptions();

        $permissions = array_keys(array_except($request->all(), ['action']));

        $roles->updatePermissions($options->get('role_id'), $permissions);
    }
}
