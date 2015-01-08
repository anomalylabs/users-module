<?php namespace Anomaly\UsersModule\Ui\Table\Permission\Handle;

/**
 * Class ColumnsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\Permission\Handle
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
        $columns = [
            [
                'heading' => 'Access',
                'value'   => function ($entry) {
                        return "<strong>{$entry->name}</strong><br><small>{$entry->description}</small>";
                    }
            ]
        ];

        return $columns;
    }
}
