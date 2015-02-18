<?php namespace Anomaly\UsersModule\Permission\Table;

use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\Role\Contract\RoleRepository;
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
     * The columns handler.
     *
     * @var array
     */
    protected $columns = [
        [
            'heading' => 'streams::addon.addon',
            'value'   => 'anomaly.module.users::admin/user/table/addon'
        ],
        [
            'heading' => 'anomaly.module.users::field.permissions.name',
            'value'   => 'anomaly.module.users::admin/user/table/permissions'
        ]
    ];

    /**
     * The actions handler.
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
     * Create a new PermissionTableBuilder instance.
     *
     * @param Table   $table
     * @param Request $request
     * @param Asset   $asset
     * @throws \Exception
     */
    public function __construct(Table $table, Request $request, Asset $asset, RoleRepository $roles)
    {
        $asset->add('scripts.js', 'module::js/permissions.js');

        $role = $roles->find($request->segment(4));

        if ($role->getSlug() == 'admin') {
            throw new \Exception("Administrator permissions can not be modified.");
        }

        $table->addData('roles', $roles->all());

        $table->setOption('role', $role);
        $table->setOption('wrapper_view', 'module::admin/permissions/wrapper');

        parent::__construct($table);
    }
}
