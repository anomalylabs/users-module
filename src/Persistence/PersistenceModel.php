<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Platform\Model\Users\UsersPersistencesEntryModel;
use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

class PersistenceModel extends UsersPersistencesEntryModel implements PersistenceRepositoryInterface
{
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

    public function forget($userId)
    {
        $this->whereUserId($userId)->delete();
    }

    public function findByUserId($userId)
    {
        return $this->whereUserId($userId)->first();
    }

    public function findByUserIdAndCode($userId, $code)
    {
        $persistence = $this->whereUserId($userId)->whereCode($code)->first();

        if ($persistence) {

            return $persistence->user_id;

        }

        return null;
    }
}
 