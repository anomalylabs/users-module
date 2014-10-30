<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Contract;

/**
 * Interface ReminderRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Contract
 */
interface ReminderRepositoryInterface
{

    /**
     * Complete a reminder by user ID and code.
     *
     * @param $getUserId
     * @param $getCode
     * @return mixed
     */
    public function complete($getUserId, $getCode);

    /**
     * Create a new minder.
     *
     * @param $userId
     * @return mixed
     */
    public function createReminder($userId);

    /**
     * Find a reminder code by user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId);
}
 