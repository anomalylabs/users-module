<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table
 */
class UserTableButtons
{

    /**
     * @param UserTableBuilder $builder
     */
    public function handle(UserTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                [
                    'href'    => 'admin/users/permissions/{entry.id}',
                    'text'    => 'Permissions',
                    'icon'    => 'icon lock',
                    'button'  => 'blue',
                    'enabled' => function (UserInterface $entry) {
                        return !$entry->hasRole('admin');
                    }
                ]
            ]
        );
    }
}
