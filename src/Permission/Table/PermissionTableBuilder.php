<?php namespace Anomaly\UsersModule\Permission\Table;

use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
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
     */
    public function __construct(Table $table, Request $request, Asset $asset)
    {
        $this->appendAssets($asset);
        $this->setTableOptions($table, $request);

        parent::__construct($table);
    }

    /**
     *
     * @param Asset $asset
     */
    protected function appendAssets(Asset $asset)
    {
        $asset->add('scripts.js', 'module::js/permissions.js', ['live']);
    }

    /**
     * Set table options.
     *
     * @param Table   $table
     * @param Request $request
     * @throws \Exception
     */
    protected function setTableOptions(Table $table, Request $request)
    {
        $role = $request->segment(4);

        if ($role == 1) {
            throw new \Exception("Administrator permissions can not be modified.");
        }

        $table->setOption('class', 'table');
        $table->setOption('role_id', $role);
        $table->setOption('wrapper_view', 'anomaly.module.users::admin/permissions/wrapper');
    }
}
