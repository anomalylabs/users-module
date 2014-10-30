<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Contract;

/**
 * Interface ReminderInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Contract
 */
interface ReminderInterface
{

    /**
     * Get the reminder's code.
     *
     * @return mixed
     */
    public function getCode();
}
 