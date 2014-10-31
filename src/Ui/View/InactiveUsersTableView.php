<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\View;

use Anomaly\Streams\Platform\Ui\Table\TableView;

/**
 * Class InactiveUsersTableView
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\View
 */
class InactiveUsersTableView extends TableView
{

    /**
     * Show only active users.
     *
     * @param $query
     * @return mixed|void
     */
    public function handle($query)
    {
        return $query
            ->leftJoin('users_activations', 'users_activations.user_id', '=', 'users_users.id')
            ->where('users_activations.is_complete', '<', 1)
            ->orWhereNull('users_activations.id');
    }
}
 