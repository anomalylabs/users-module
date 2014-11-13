<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table\View;

use Anomaly\Streams\Platform\Ui\Table\TableView;

/**
 * Class ActiveUsersTableView
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\View
 */
class ActiveUsersTableView extends TableView
{

    /**
     * Show only active users.
     *
     * @param $query
     * @return mixed|void
     */
    public function handle($query)
    {
        return $query->where('is_activated', 1)->where('is_blocked', null);
    }
}
 