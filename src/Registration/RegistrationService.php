<?php namespace Anomaly\Streams\Addon\Module\Users\Registration;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationService;
use Anomaly\Streams\Addon\Module\Users\Registration\Command\RegisterUserCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

class RegistrationService
{

    use CommandableTrait;

    protected $activation;

    function __construct(ActivationService $activation)
    {
        $this->activation = $activation;
    }

    public function register(array $credentials, $activate = false)
    {
        $command = new RegisterUserCommand($credentials);

        $user = $this->execute($command);

        if (evaluate($activate) == true) {

            $this->activation->force($user);
        }
    }
}
 