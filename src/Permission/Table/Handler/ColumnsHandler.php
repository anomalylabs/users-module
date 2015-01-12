<?php namespace Anomaly\UsersModule\Permission\Table\Handler;

/**
 * Class ColumnsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table\Handler
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
            [
                'heading' => 'streams::misc.addon',
                'value'   => 'anomaly.module.users::admin/user/table/addon'
            ],
            [
                'heading' => 'anomaly.module.users::field.permissions.name',
                'value'   => 'anomaly.module.users::admin/user/table/permissions'
            ]
        ];
    }
}
