<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceInterface;
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
class PersistenceModel extends UsersPersistencesEntryModel implements PersistenceRepositoryInterface, PersistenceInterface
{

    /**
     * Find a persistence code by ID or create a new one.
     *
     * @param $userId
     * @return static
     */
    public function findPersistenceByIdOrCreate($userId)
    {
        $persistence = $this->findPersistenceByUserId($userId);

        if (!$persistence) {

            $persistence = $this->newInstance();

            $persistence->user_id = $userId;
        }

        $persistence->code = rand_string(40);

        $persistence->save();

        return $persistence;
    }

    /**
     * Delete a persistence for a user.
     *
     * @param $userId
     */
    public function forgetPersistence($userId)
    {
        $this->whereUserId($userId)->delete();
    }

    /**
     * Find a persistence object by user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findPersistenceByUserId($userId)
    {
        return $this->whereUserId($userId)->first();
    }

    /**
     * Find a persistence object by user ID and it's code.
     *
     * @param $userId
     * @param $code
     * @return mixed|null
     */
    public function findPersistenceByUserIdAndCode($userId, $code)
    {
        $persistence = $this->whereUserId($userId)->whereCode($code)->first();

        if ($persistence) {

            return $persistence;
        }

        return null;
    }

    /**
     * Get the persistence code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}
 