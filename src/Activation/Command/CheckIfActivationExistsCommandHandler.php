<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel;

class CheckIfActivationExistsCommandHandler
{
    protected $activation;

    function __construct(ActivationModel $activation)
    {
        $this->activation = $activation;
    }

    public function handle(CheckIfActivationExistsCommand $command)
    {
        return $this->activation->findByUserId($command->getUserId());
    }
}
 