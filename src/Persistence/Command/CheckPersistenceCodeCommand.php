<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

/**
 * Class CheckPersistenceCodeCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Command
 */
class CheckPersistenceCodeCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * The persistence code.
     *
     * @var
     */
    protected $code;

    /**
     * Create a new CheckPersistenceCodeCommand instance.
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
     * Get the persistence code.
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
 