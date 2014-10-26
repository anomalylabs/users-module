<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel;

class CheckPersistenceCodeCommandHandler
{
    protected $persistences;

    function __construct(PersistenceModel $persistences)
    {
        $this->persistences = $persistences;
    }

    public function handle(CheckPersistenceCodeCommand $command)
    {
        return $this->persistences->findByUserIdAndCode($command->getUserId(), $command->getCode());
    }
}
 