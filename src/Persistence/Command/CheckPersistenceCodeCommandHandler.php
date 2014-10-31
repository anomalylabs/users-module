<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

/**
 * Class CheckPersistenceCodeCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Command
 */
class CheckPersistenceCodeCommandHandler
{

    /**
     * The persistence repository object..
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface
     */
    protected $persistences;

    /**
     * Create a new CheckPersistenceCodeCommandHandler instance.
     *
     * @param PersistenceRepositoryInterface $persistences
     */
    function __construct(PersistenceRepositoryInterface $persistences)
    {
        $this->persistences = $persistences;
    }

    /**
     * Handle the command.
     *
     * @param CheckPersistenceCodeCommand $command
     * @return mixed
     */
    public function handle(CheckPersistenceCodeCommand $command)
    {
        return $this->persistences->findPersistenceByUserIdAndCode($command->getUserId(), $command->getCode());
    }
}
 