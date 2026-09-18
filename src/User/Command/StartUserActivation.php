<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Carbon\Carbon;


/**
 * Class StartUserActivation
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class StartUserActivation
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new StartUserActivation instance.
     *
     * @param UserInterface $user
     */
    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the command.
     *
     * @param  UserRepositoryInterface $users
     * @return bool
     */
    public function handle(UserRepositoryInterface $users)
    {
        $users->save(
            $this->user
                ->setAttribute('activation_code', str_random(40))
                ->setAttribute(
                    'activation_code_expires_at',
                    Carbon::now()->addMinutes(
                        (int) config('anomaly.module.users::config.activation_code_ttl', 60 * 24 * 7)
                    )
                )
        );

        return true;
    }
}
