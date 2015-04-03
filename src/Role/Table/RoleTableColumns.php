<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class RoleTableColumns
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Table
 */
class RoleTableColumns
{

    /**
     * Handle the table columns.
     *
     * @param RoleTableBuilder $builder
     */
    public function handle(RoleTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'name',
                'slug',
                [
                    'heading' => 'permissions',
                    'value'   => function (RoleInterface $entry) {
                        if ($permissions = $entry->getPermissions()) {
                            return '<div class="label label-default">
                            <i class="fa fa-lock"></i> ' . trans(
                                'module::field.permissions.count',
                                ['count' => count($permissions)]
                            ) . '
                            </div>';
                        }
                    }
                ]
            ]
        );
    }
}
