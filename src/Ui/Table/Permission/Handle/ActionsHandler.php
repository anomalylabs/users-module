<?php namespace Anomaly\UsersModule\Ui\Table\Permission\Handle;

/**
 * Class ActionsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\Permission\Handle
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
        return ['save'];
    }
}
