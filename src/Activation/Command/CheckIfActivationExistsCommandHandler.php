<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class CheckIfActivationExistsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class CheckIfActivationExistsCommandHandler
{

    /**
     * The activation repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Create a new CheckIfActivationExistsCommandHandler instance.
     *
     * @param ActivationRepositoryInterface $activations
     */
    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * Handle the command.
     *
     * @param CheckIfActivationExistsCommand $command
     * @return mixed
     */
    public function handle(CheckIfActivationExistsCommand $command)
    {
        return $this->activations->findActivationByUserId($command->getUserId());
    }
}
 