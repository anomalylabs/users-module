<?php namespace Anomaly\UsersModule\Role\Ui\Table\Handler;

/**
 * Class ColumnsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class ColumnsHandler
{

    /**
     * Return the table columns.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'name',
            'slug',
        ];
    }
}
