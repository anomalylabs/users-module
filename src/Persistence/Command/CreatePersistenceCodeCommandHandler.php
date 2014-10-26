<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel;

class CreatePersistenceCodeCommandHandler
{
    protected $persistences;

    function __construct(PersistenceModel $persistences)
    {
        $this->persistences = $persistences;
    }

    public function handle(CreatePersistenceCodeCommand $command)
    {
        return $this->persistences->findByIdOrCreate($command->getUserId());
    }
}
 