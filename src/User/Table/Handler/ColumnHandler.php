<?php namespace Anomaly\UsersModule\User\Table\Handler;

/**
 * Class ColumnHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\User\Handler
 */
class ColumnHandler
{

    /**
     * Return the table columns.
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
