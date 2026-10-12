<?php namespace Anomaly\UsersModule\Console;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Illuminate\Console\Command;

/**
 * Class ResetTwoFactor
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class ResetTwoFactor extends Command
{

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'users:reset-two-factor {user : The ID, email or username of the user}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Turn off two-factor authentication for a user.';

    /**
     * Handle the command.
     *
     * @param  UserRepositoryInterface $users
     * @param  TwoFactor               $twoFactor
     * @return int
     */
    public function handle(UserRepositoryInterface $users, TwoFactor $twoFactor)
    {
        $identifier = $this->argument('user');

        $user = ctype_digit($identifier) ? $users->find($identifier) : null;

        if (!$user) {
            $user = $users->findByEmail($identifier) ?: $users->findByUsername($identifier);
        }

        if (!$user) {

            $this->error("No user matches [{$identifier}].");

            return 1;
        }

        $twoFactor->reset($user);

        $this->info("Two-factor authentication is off for [{$user->getUsername()}].");

        return 0;
    }
}
