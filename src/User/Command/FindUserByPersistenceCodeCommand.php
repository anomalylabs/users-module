<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

/**
 * Class FindUserByPersistenceCodeCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class FindUserByPersistenceCodeCommand
{

    /**
     * The persistence code.
     *
     * @var
     */
    protected $code;

    /**
     * Create a new FindUserByPersistenceCodeCommand instance.
     *
     * @param $code
     */
    function __construct($code)
    {
        $this->code = $code;
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
}
 