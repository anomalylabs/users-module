<?php namespace Anomaly\UsersModule\User\TwoFactor;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\TwoFactorWasEnabled;
use Anomaly\UsersModule\User\Notification\TwoFactorCode;
use Carbon\Carbon;
use Illuminate\Contracts\Config\Repository;

/**
 * Class TwoFactorEmail
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorEmail
{

    /**
     * The session key.
     */
    const STATE = 'users.two_factor.email';

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new TwoFactorEmail instance.
     *
     * @param Repository              $config
     * @param UserRepositoryInterface $users
     */
    public function __construct(Repository $config, UserRepositoryInterface $users)
    {
        $this->users  = $users;
        $this->config = $config;
    }

    /**
     * Email the user a new code. Returns the seconds
     * to wait instead when one was sent too
     * recently.
     *
     * @param  UserInterface $user
     * @param  string        $purpose
     * @return int
     */
    public function send(UserInterface $user, $purpose)
    {
        $state = $this->state($user, $purpose);

        $delay = (int) $this->config->get('anomaly.module.users::two_factor.resend_delay', 60);

        if ($state && ($wait = $state['sent_at'] + $delay - time()) > 0) {
            return $wait;
        }

        $code    = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $minutes = (int) $this->config->get('anomaly.module.users::two_factor.email_code_ttl', 10);

        session()->put(
            self::STATE,
            [
                'id'         => (int) $user->getId(),
                'purpose'    => $purpose,
                'hash'       => $this->hash($code),
                'attempts'   => 0,
                'sent_at'    => time(),
                'expires_at' => time() + 60 * $minutes,
            ]
        );

        $user->notify(new TwoFactorCode($code, $minutes));

        return 0;
    }

    /**
     * Return whether an unexpired code
     * is waiting to be entered.
     *
     * @param  UserInterface $user
     * @param  string        $purpose
     * @return bool
     */
    public function outstanding(UserInterface $user, $purpose)
    {
        $state = $this->state($user, $purpose);

        return $state && $state['expires_at'] >= time() && $state['attempts'] < $this->maxAttempts();
    }

    /**
     * Verify an emailed code. The code
     * can be used once.
     *
     * @param  UserInterface $user
     * @param  string        $code
     * @param  string        $purpose
     * @return bool
     */
    public function verify(UserInterface $user, $code, $purpose)
    {
        if (!$this->outstanding($user, $purpose)) {
            return false;
        }

        $state = session(self::STATE);

        if (!hash_equals($state['hash'], $this->hash($code))) {

            $state['attempts']++;

            session()->put(self::STATE, $state);

            return false;
        }

        session()->forget(self::STATE);

        return true;
    }

    /**
     * Mark email codes as set up for the user.
     *
     * @param UserInterface $user
     */
    public function enable(UserInterface $user)
    {
        $this->users->save($user->setAttribute('two_factor_email_confirmed_at', Carbon::now()));

        event(new TwoFactorWasEnabled($user, 'email'));
    }

    /**
     * Return the user's code state for a purpose.
     *
     * @param  UserInterface $user
     * @param  string        $purpose
     * @return array|null
     */
    protected function state(UserInterface $user, $purpose)
    {
        $state = session(self::STATE);

        if (
            !$state
            || (int) array_get($state, 'id') !== (int) $user->getId()
            || array_get($state, 'purpose') !== $purpose
        ) {
            return null;
        }

        return $state;
    }

    /**
     * Return the attempts allowed per code.
     *
     * @return int
     */
    protected function maxAttempts()
    {
        return (int) $this->config->get('anomaly.module.users::two_factor.max_attempts', 5);
    }

    /**
     * Hash a code.
     *
     * @param  string $code
     * @return string
     */
    protected function hash($code)
    {
        return hash_hmac('sha256', (string) $code, $this->config->get('app.key'));
    }
}
