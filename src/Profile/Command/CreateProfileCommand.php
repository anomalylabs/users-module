<?php namespace Anomaly\Streams\Addon\Module\Users\Profile\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class CreateProfileCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Profile\Command
 */
class CreateProfileCommand
{

    /**
     * Create a user object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    protected $data;

    /**
     * Create a new CreateProfileCommand instance.
     *
     * @param UserInterface $user
     */
    function __construct(UserInterface $user, array $data = [])
    {
        $this->user       = $user;
        $this->data = $data;
    }

    /**
     * The profile data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the user object.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}
 