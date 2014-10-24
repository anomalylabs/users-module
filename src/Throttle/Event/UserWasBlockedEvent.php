<?php namespace Anomaly\Streams\Addon\Module\Users\Throttle\Event;

use Anomaly\Streams\Addon\Module\Users\Throttle\ThrottleModel;

class UserWasBlockedEvent
{
    protected $throttle;

    function __construct(ThrottleModel $throttle)
    {
        $this->throttle = $throttle;
    }

    /**
     * @return mixed
     */
    public function getThrottle()
    {
        return $this->throttle;
    }
}
 