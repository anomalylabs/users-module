<?php namespace Anomaly\UsersModule\User\Support\RelationshipFieldType;

/**
 * Class ValueTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Support\RelationshipFieldType
 */
class ValueTableBuilder extends \Anomaly\RelationshipFieldType\Table\ValueTableBuilder
{

    protected $columns = [
        'display_name',
        'username',
        'email',
        'status' => [
            'value' => 'entry.status_label'
        ]
    ];
}
