<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\UsersModule\Role\Contract\Role;

/**
 * Class RoleTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Table\Handler
 */
class RoleTableButtons
{

    /**
     * Return the table buttons.
     *
     * @param RoleTableBuilder $builder
     */
    public function handle(RoleTableBuilder $builder)
    {
        $builder->setButtons(
            [
                [
                    'icon'    => 'sliders',
                    'type'    => 'default',
                    'href'    => '/admin/users/permissions/{{ entry.id }}',
                    'enabled' => function (Role $entry) {
                        return ($entry->getSlug() !== 'admin');
                    },
                ],
                'edit'
            ]
        );
    }
}
