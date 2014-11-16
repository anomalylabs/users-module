<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasCreatedEvent;
use Anomaly\Streams\Platform\Entry\EntryModelObserver;

/**
 * Class UserModelObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserModelObserver extends EntryModelObserver
{

    /**
     * Fire after a user is created.
     *
     * @param $model
     */
    public function created($model)
    {
        $this->dispatch(new UserWasCreatedEvent($model));

        parent::created($model);
    }
}
 