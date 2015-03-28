<?php namespace Anomaly\UsersModule\User\Table\View;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class PendingActivation
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\View
 */
class PendingActivation
{

    /**
     * Handle the view query.
     *
     * @param Builder $query
     */
    public function handle(Builder $query)
    {
        $query->where('activated', false)->orWhereNull('activated');
    }
}
