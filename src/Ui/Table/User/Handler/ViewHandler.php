<?php namespace Anomaly\UsersModule\Ui\Table\User\Handler;

/**
 * Class ViewHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\User\Handler
 */
class ViewHandler
{

    /**
     * Return the table views.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'all',
            'recently_created'
        ];
    }
}
