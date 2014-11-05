<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Entry\EntryPresenter;

/**
 * Class UserModelPresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserModelPresenter extends EntryPresenter
{

    /**
     * Return the name of the user.
     *
     * @return string
     */
    public function name()
    {
        return "{$this->resource->first_name} {$this->resource->last_name}";
    }
}
 