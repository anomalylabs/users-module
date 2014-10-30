<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

/**
 * Class CompleteActivationCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class CompleteActivationCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * The activation code.
     *
     * @var
     */
    protected $code;

    /**
     * Create a new CompleteActivationCommand instance.
     *
     * @param $userId
     * @param $code
     */
    function __construct($userId, $code)
    {
        $this->code   = $code;
        $this->userId = $userId;
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

    /**
     * Get the user ID.
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
 