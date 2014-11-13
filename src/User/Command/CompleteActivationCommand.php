<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class CompleteActivationCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class CompleteActivationCommand
{

    /**
     * The user object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    /**
     * The activation code.
     *
     * @var
     */
    protected $code;

    /**
     * Create a new CompleteActivationCommand instance.
     *
     * @param UserInterface $user
     * @param               $code
     */
    function __construct(UserInterface $user, $code)
    {
        $this->code = $code;
        $this->user = $user;
    }

    /**
     * Get the user object.
     *
     * @return \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the activation code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}
 