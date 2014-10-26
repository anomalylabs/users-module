<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Contract;

interface ReminderInterface
{

    public function getCode();

    public function raise($event);

}
 