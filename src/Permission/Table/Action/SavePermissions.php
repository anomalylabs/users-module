<?php namespace Anomaly\UsersModule\Permission\Table\Action;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\UsersModule\Role\Contract\RoleRepository;
use Illuminate\Session\SessionManager;

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
     * @param RoleRepository $roles
     */
    public function handle(Table $table, RoleRepository $roles)
    {
        $options = $table->getOptions();

        $permissions = array_get($_POST, 'permission', []);

        $roles->updatePermissions($options->get('role_id'), $permissions);

        $table->setResponse(redirect('admin/users/permissions/' . $options->get(('role_id'))));
    }
}
