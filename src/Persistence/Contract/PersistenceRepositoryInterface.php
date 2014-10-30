<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Contract;

interface PersistenceRepositoryInterface
{

    public function findByIdOrCreate($userId);

    public function forget($userId);

    public function findByUserId($userId);

    public function findByUserIdAndCode($userId, $code);
}
 