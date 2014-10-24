<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;

class RemoveActivationCommandHandler
{
    protected $activation;

    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    public function handle(RemoveActivationCommand $command)
    {
        return $this->activation->removeActivation($command->getUserId());
    }
}
 