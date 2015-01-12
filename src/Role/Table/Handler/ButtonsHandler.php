<?php namespace Anomaly\UsersModule\Role\Table\Handler;

use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class ButtonsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Table\Handler
 */
class ButtonsHandler
{

    /**
     * Return the table buttons.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'edit',
            [
                'icon'    => 'unlock-alt',
                'type'    => 'default',
                'url'     => '/admin/users/permissions/{{ entry.id }}',
                'enabled' => function (RoleInterface $entry) {
                    return ($entry->getSlug() !== 'admin');
                },
            ]
        ];
    }
}
