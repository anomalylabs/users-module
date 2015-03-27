<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class RoleTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Table
 */
class RoleTableButtons
{

    /**
     * Handle the table buttons.
     *
     * @param RoleTableBuilder $builder
     */
    public function handle(RoleTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                [
                    'href'    => 'admin/users/roles/permissions/{entry.id}',
                    'text'    => 'Permissions',
                    'icon'    => 'icon lock',
                    'button'  => 'blue',
                    'enabled' => function (RoleInterface $entry) {
                        return $entry->getSlug() !== 'admin';
                    }
                ]
            ]
        );
    }
}
