<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class UserPermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class UserPermissionTableBuilder extends TableBuilder
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
            'handler' => 'Anomaly\UsersModule\User\Table\Action\SavePermissions@handle'
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
            'view'    => 'module::admin/permissions/user'
        ]
    ];

    /**
     * Create a new UserPermissionTableBuilder instance.
     *
     * @param Table   $table
     * @param Request $request
     * @param Asset   $asset
     * @throws \Exception
     */
    public function __construct(Table $table, Request $request, Asset $asset, UserRepositoryInterface $users)
    {
        $asset->add('scripts.js', 'module::js/permissions.js');
        $asset->add('styles.css', 'module::less/permissions.less');

        $user = $users->find($request->segment(4));

        if ($user && $user->hasRole('admin')) {
            abort(403, trans('module::message.edit_admin_error'));
        }

        $table->setOption('user', $user);
        $table->setOption('attributes', ['id' => 'permissions']);
        $table->setOption('class', 'ui stackable top aligned table');
        $table->setOption('wrapper_view', 'module::admin/permissions/wrapper');
        $table->setOption('permission', 'anomaly.module.users::users.permissions');

        $table->setOption(
            'title',
            trans(
                'module::admin.edit_user_permissions',
                ['username' => $user->getUsername(), 'email' => $user->getEmail()]
            )
        );
        $table->setOption(
            'information',
            trans(
                'module::admin.edit_user_permissions_information',
                ['username' => $user->getUsername(), 'roles' => implode(', ', $user->getRoles()->lists('slug'))]
            )
        );

        parent::__construct($table);
    }
}
