<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Persistence\Command\CheckPersistenceCodeCommand;
use Anomaly\Streams\Addon\Module\Users\Persistence\Command\CreatePersistenceCodeCommand;
use Anomaly\Streams\Addon\Module\Users\Persistence\Command\ForgetPersistenceCodesCommand;

class PersistenceService
{
    use CommandableTrait;

    public function persist($userId)
    {
        $command = new CreatePersistenceCodeCommand($userId);

        return $this->execute($command);
    }

    public function forget($userId)
    {
        $command = new ForgetPersistenceCodesCommand($userId);

        $this->execute($command);
    }

    public function check($userId, $code)
    {
        $command = new CheckPersistenceCodeCommand($userId, $code);

        return $this->execute($command);
    }
}
 