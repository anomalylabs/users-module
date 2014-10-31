<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Exception\ActivationNotFoundException;

/**
 * Class CompleteActivationCommandValidator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class CompleteActivationCommandValidator
{

    /**
     * The activation repository object.
     *
     * @var
     */
    protected $activations;

    /**
     * Create a new CompleteActivationCommandValidator instance.
     *
     * @param ActivationRepositoryInterface $activations
     */
    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * Validate the command.
     *
     * @param CompleteActivationCommand $command
     */
    public function validate(CompleteActivationCommand $command)
    {
        $this->validateActivation($command->getUserId(), $command->getCode());
    }

    /**
     * Validate the activation code.
     *
     * @param $userId
     * @param $code
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\ActivationNotFoundException
     */
    protected function validateActivation($userId, $code)
    {
        $activation = $this->activations->findActivationByUserIdAndCode($userId, $code);

        if (!$activation) {

            throw new ActivationNotFoundException("The activation could not be found [{$code}].");
        }
    }
}
 