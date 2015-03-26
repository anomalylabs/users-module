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
                'entry.roles.lists',
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
                ]
            ]
        );
    }
}
