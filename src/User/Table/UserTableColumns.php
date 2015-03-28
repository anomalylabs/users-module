<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\UsersModule\User\Contract\UserInterface;

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
                    'heading' => 'module::admin.status',
                    'wrap'    => function (UserInterface $entry) {

                        if ($entry->isBlocked()) {
                            return '<span class="ui label red">{value}</span>';
                        } elseif ($entry->isActivated()) {
                            return '<span class="ui label green">{value}</span>';
                        } elseif (!$entry->isActivated()) {
                            return '<span class="ui label">{value}</span>';
                        }
                    },
                    'value'   => function (UserInterface $entry) {

                        if ($entry->isBlocked()) {
                            return trans('module::field.blocked.blocked');
                        } elseif ($entry->isActivated()) {
                            return trans('module::field.activated.activated');
                        } elseif (!$entry->isActivated()) {
                            return trans('module::field.activated.not_activated');
                        }
                    }
                ],
                [
                    'heading' => 'roles',
                    'value'   => function (UserInterface $entry) {
                        if ($roles = $entry->getRoles()) {
                            return '<div class="ui label tooltip"
                            data-content="' . implode(', ', $roles->lists('name')) . '">
                            <i class="users icon"></i> ' . trans(
                                'module::field.roles.count',
                                ['count' => count($roles)]
                            ) . '
                            </div>';
                        }
                    }
                ],
                [
                    'heading' => 'permissions',
                    'value'   => function (UserInterface $entry) {
                        if ($permissions = $entry->getPermissions()) {
                            return '<div class="ui label">
                            <i class="lock icon"></i> ' . trans(
                                'module::field.permissions.count',
                                ['count' => count($permissions)]
                            ) . '
                            </div>';
                        }
                    }
                ],
                [
                    'heading' => 'created_at',
                    'value'   => 'entry.created_at_datetime'
                ]
            ]
        );
    }
}
