<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class RolePermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class RolePermissionTableBuilder extends TableBuilder
{

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'save' => [
            'button'  => 'save',
            'toggle'  => false,
            'handler' => 'Anomaly\UsersModule\Role\Table\Action\SavePermissions@handle'
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
            'view'    => 'module::admin/permissions/addon'
        ],
        [
            'heading' => 'module::field.permissions.name',
            'view'    => 'module::admin/permissions/permissions'
        ]
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [
        'scripts.js' => 'module::js/permissions.js',
        'styles.css' => 'module::less/permissions.less'
    ];

    /**
     * The options array.
     *
     * @var array
     */
    protected $options = [
        'breadcrumb' => 'Permissions'
    ];

    /**
     * Create a new RolePermissionTableBuilder instance.
     *
     * @param Table   $table
     * @param Request $request
     * @param Asset   $asset
     * @throws \Exception
     */
    public function __construct(Table $table, Request $request, Asset $asset, RoleRepositoryInterface $roles)
    {
        $role = $roles->find($request->segment(5));

        if ($role && $role->getSlug() == 'admin') {
            abort(403, trans('module::message.edit_admin_error'));
        }

        $this->setOption('subject', $role);
        $this->setOption('attributes', ['id' => 'permissions']);
        $this->setOption('class', 'table striped align-top');
        $this->setOption('permission', 'anomaly.module.users::roles.permissions');

        $this->setOption(
            'title',
            trans(
                'module::meta.edit_role_permissions',
                ['slug' => $role->getSlug()]
            )
        );
        $this->setOption(
            'description',
            trans(
                'module::meta.edit_role_permissions_information',
                ['slug' => $role->getSlug()]
            )
        );

        parent::__construct($table);
    }
}
