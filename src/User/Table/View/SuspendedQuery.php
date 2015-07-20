<?php namespace Anomaly\UsersModule\User\Table\View;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class SuspendedQuery
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\View
 */
class SuspendedQuery
{

    /**
     * Handle the query.
     *
     * @param Builder $query
     */
    public function handle(Builder $query)
    {
        $query
            ->leftJoin('users_suspensions', 'users_suspensions.user_id', '=', 'users_users.id')
            ->whereNotNull('users_suspensions.user_id');
    }
}
