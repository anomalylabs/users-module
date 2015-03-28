<?php namespace Anomaly\UsersModule\User\Table\View;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class BlockedUsers
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\View
 */
class BlockedUsers
{

    /**
     * Handle the view query.
     *
     * @param Builder $query
     */
    public function handle(Builder $query)
    {
        $query->where('blocked', true);
    }
}
