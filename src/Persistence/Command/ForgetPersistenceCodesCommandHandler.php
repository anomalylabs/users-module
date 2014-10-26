<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel;

class ForgetPersistenceCodesCommandHandler
{
    protected $persistences;

    function __construct(PersistenceModel $persistences)
    {
        $this->persistences = $persistences;
    }

    public function handle(ForgetPersistenceCodesCommand $command)
    {
        $this->persistences->forget($command->getUserId());
    }
}
 