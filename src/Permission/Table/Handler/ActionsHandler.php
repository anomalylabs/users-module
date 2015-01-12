<?php namespace Anomaly\UsersModule\Permission\Table\Handler;

/**
 * Class ActionsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table\Handler
 */
class ActionsHandler
{

    /**
     * Return table actions.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'save' => [
                'button'  => 'save',
                'handler' => 'Anomaly\UsersModule\Permission\Table\Action\Handler\SaveActionHandler@handle'
            ]
        ];
    }
}
