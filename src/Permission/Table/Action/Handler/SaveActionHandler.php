<?php namespace Anomaly\UsersModule\Permission\Table\Action\Handler;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Session\SessionManager;

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
     *
     * @param Table                   $table
     * @param RoleRepositoryInterface $roles
     */
    public function handle(Table $table, RoleRepositoryInterface $roles, SessionManager $session)
    {
        $options = $table->getOptions();

        $permissions = array_get($_POST, 'permission', []);

        $roles->updatePermissions($options->get('role_id'), $permissions);

        $table->setResponse(redirect('admin/users/permissions/' . $options->get(('role_id'))));
    }
}
