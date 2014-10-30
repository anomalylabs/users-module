<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

class FindUserByPersistenceCodeCommandHandler
{

    protected $persistence;

    function __construct(PersistenceService $persistence)
    {
        $this->persistence = $persistence;
    }

    public function handle(FindUserByPersistenceCodeCommand $command)
    {
        $persistence = $this->persistence->exists($command->getCode());

        if ($persistence) {

            return $persistence->user;
        }

        return null;
    }
}
 