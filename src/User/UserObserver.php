<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Anomaly\UsersModule\User\Event\UserWasCreated;
use Anomaly\UsersModule\User\Event\UserWasDeleted;
use Anomaly\UsersModule\User\Event\UserWasUpdated;

/**
 * Class UserObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UserObserver extends EntryObserver
{

    /**
     * Fired after a user is created.
     *
     * @param EntryInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->events->fire(new UserWasCreated($entry));

        parent::created($entry);
    }

    /**
     * Fired after a user is deleted.
     *
     * @param EntryInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        if (!$entry->isForceDeleting()) {
            $this->events->fire(new UserWasDeleted($entry));
        }

        parent::deleted($entry);
    }
    
    /**
     * Fired after a user is updated.
     *
     * @param EntryInterface $entry
     */
    public function updated(EntryInterface $entry)
    {
        $this->events->fire(new UserWasUpdated($entry));
        
        parent::updated($entry);
    }
}
