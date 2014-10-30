<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

class FindUserByPersistenceCodeCommand
{

    protected $code;

    function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}
 