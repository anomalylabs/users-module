<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Contract;

interface ReminderRepositoryInterface
{

    public function complete($getUserId, $getCode);

    public function createReminder($userId);

    public function findByUserId($userId);

    public function raise($event);

}
 