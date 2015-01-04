<?php namespace Anomaly\UsersModule\Ui\Table\User\Handler;

/**
 * Class FilterHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\User\Handler
 */
class FilterHandler
{

    /**
     * Return the table filters.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'username',
            'email',
        ];
    }
}
