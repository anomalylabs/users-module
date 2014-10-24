<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;

class ForceActivationCommandHandler
{
    protected $activation;

    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    public function handle(ForceActivationCommand $command)
    {
        return $this->activation->forceActivation($command->getUserId());
    }
}
 