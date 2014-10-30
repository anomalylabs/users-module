<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;
use Anomaly\Streams\Platform\Model\Users\UsersPersistencesEntryModel;

/**
 * Class PersistenceModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence
 */
class PersistenceModel extends UsersPersistencesEntryModel implements PersistenceRepositoryInterface
{

    /**
     * Find a persistence code by ID or create a new one.
     *
     * @param $userId
     * @return string
     */
    public function findByIdOrCreate($userId)
    {
        $persistence = $this->findByUserId($userId);

        if (!$persistence) {

            $persistence = $this->newInstance();

            $persistence->user_id = $userId;
        }

        $persistence->code = rand_string(40);

        $persistence->save();

        return $persistence->code;
    }

    /**
     * Delete a persistence code.
     *
     * @param $userId
     */
    public function forget($userId)
    {
        $this->whereUserId($userId)->delete();
    }

    /**
     * Find a persistence object by user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId)
    {
        return $this->whereUserId($userId)->first();
    }

    /**
     * Find a persistence object by user ID and it's code.
     *
     * @param $userId
     * @param $code
     * @return null
     */
    public function findByUserIdAndCode($userId, $code)
    {
        $persistence = $this->whereUserId($userId)->whereCode($code)->first();

        if ($persistence) {

            return $persistence->user_id;
        }

        return null;
    }
}
 