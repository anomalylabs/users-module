<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\UsersModule\User\Contract\User;

/**
 * Class ButtonsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Table\User
 */
class UserTableColumns
{

    /**
     * Handle the columns.
     *
     * @param UserTableBuilder $builder
     */
    public function handle(UserTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'username',
                'email',
                [
                    'heading' => 'roles',
                    'value'   => function (User $entry) {

                        $roles = $entry->getRoles();

                        return implode(', ', $roles->lists('name'));
                    }
                ],
                [
                    'heading' => 'module::admin.status',
                    'wrap'    => function (User $entry) {

                        if ($entry->isBlocked()) {
                            return '<span class="label label-danger">:value</span>';
                        } elseif ($entry->isActivated()) {
                            return '<span class="label label-success">:value</span>';
                        } elseif (!$entry->isActivated()) {
                            return '<span class="label label-default">:value</span>';
                        }
                    },
                    'value'   => function (User $entry) {

                        if ($entry->isBlocked()) {
                            return trans('module::field.blocked.blocked');
                        } elseif ($entry->isActivated()) {
                            return trans('module::field.activated.activated');
                        } elseif (!$entry->isActivated()) {
                            return trans('module::field.activated.not_activated');
                        }
                    }
                ]
            ]
        );
    }
}
