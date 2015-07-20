<?php namespace Anomaly\UsersModule\User\Table\View;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class InactiveQuery
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\View
 */
class InactiveQuery
{

    /**
     * Handle the query.
     *
     * @param Builder $query
     */
    public function handle(Builder $query)
    {
        $query
            ->leftJoin('users_activations', 'users_activations.user_id', '=', 'users_users.id')
            ->where('users_activations.completed', false)
            ->orWhereNull('users_activations.id');
    }
}
