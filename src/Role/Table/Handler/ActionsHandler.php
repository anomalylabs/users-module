<?php namespace Anomaly\UsersModule\Role\Table\Handler;

/**
 * Class ActionsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Table\Handler
 */
class ActionsHandler
{

    /**
     * Return the table actions.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'delete' => [
                'permission' => 'anomaly.module.users::permission.delete_user',
            ],
        ];
    }
}
