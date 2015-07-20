<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserPresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserPresenter extends EntryPresenter
{

    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var UserInterface
     */
    protected $object;

    /**
     * Return the users name.
     *
     * @return string
     */
    public function name()
    {
        return implode(' ', array_filter([$this->object->getFirstName(), $this->object->getLastName()]));
    }
}
