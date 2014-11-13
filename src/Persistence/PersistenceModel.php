<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceInterface;
use Anomaly\Streams\Platform\Model\Users\UsersPersistencesEntryModel;

/**
 * Class PersistenceModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence
 */
class PersistenceModel extends UsersPersistencesEntryModel implements PersistenceInterface
{

    /**
     * Get the persistence's code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the related user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Return the user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(config('module.users::config.users.model'), 'user_id');
    }
}
 