<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Extension\CheckExtension;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class RunSecurityChecksCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class RunSecurityChecksCommandHandler
{

    /**
     * Handle the command.
     *
     * @param RunSecurityChecksCommand $command
     */
    public function handle(RunSecurityChecksCommand $command)
    {
        $user  = $command->getUser();
        $point = $command->getPoint();

        foreach (config('module.users::config.security_checks') as $check) {

            $this->runSecurityCheck($check, $point, $user);
        }
    }

    /**
     * Run a security check.
     *
     * @param               $check
     * @param               $point
     * @param UserInterface $user
     * @throws \Exception
     */
    protected function runSecurityCheck($check, $point, UserInterface $user = null)
    {
        $extension = app('streams.extensions')->get("module.users::{$check}.check");

        if ($extension instanceof CheckExtension) {

            $extension->{$point}($user);

            return;
        }

        throw new \Exception("Security check [{$check}] not found.");
    }
}
 