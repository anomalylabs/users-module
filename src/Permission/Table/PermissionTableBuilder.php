<?php namespace Anomaly\UsersModule\Permission\Table;

use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class PermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class PermissionTableBuilder extends TableBuilder
{

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'save' => [
            'button'  => 'save',
            'handler' => 'Anomaly\UsersModule\Permission\Table\Action\SavePermissions@handle'
        ]
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        [
            'heading' => 'streams::addon.addon',
            'view'    => 'module::admin/permissions/table/fragments/addon'
        ],
        [
            'heading' => 'module::field.permissions.name',
            'view'    => 'module::admin/permissions/table/fragments/permissions'
        ]
    ];

    /**
     * Create a new PermissionTableBuilder instance.
     *
     * @param Table   $table
     * @param Request $request
     * @param Asset   $asset
     * @throws \Exception
     */
    public function __construct(Table $table, Request $request, Asset $asset, RoleRepositoryInterface $roles)
    {
        $asset->add('scripts.js', 'module::js/permissions.js');

        $role = $roles->find($request->segment(5));

        if ($role && $role->getSlug() == 'admin') {
            abort(403, trans('module::message.edit_admin_error'));
        }

        $table->setOption('role', $role);

        $table->addData('roles', $roles->all());

        parent::__construct($table);
    }
}
