<?php namespace Anomaly\UsersModule\User\TwoFactor;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Cache\RateLimiter;
use Illuminate\Contracts\Config\Repository;

/**
 * Class TwoFactorVerifier
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorVerifier
{

    /**
     * The rate limiter.
     *
     * @var RateLimiter
     */
    protected $limiter;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The email method.
     *
     * @var TwoFactorEmail
     */
    protected $email;

    /**
     * The recovery codes.
     *
     * @var TwoFactorRecovery
     */
    protected $recovery;

    /**
     * The authenticator method.
     *
     * @var TwoFactorAuthenticator
     */
    protected $authenticator;

    /**
     * Create a new TwoFactorVerifier instance.
     *
     * @param RateLimiter            $limiter
     * @param Repository             $config
     * @param TwoFactorEmail         $email
     * @param TwoFactorRecovery      $recovery
     * @param TwoFactorAuthenticator $authenticator
     */
    public function __construct(
        RateLimiter $limiter,
        Repository $config,
        TwoFactorEmail $email,
        TwoFactorRecovery $recovery,
        TwoFactorAuthenticator $authenticator
    ) {
        $this->email         = $email;
        $this->config        = $config;
        $this->limiter       = $limiter;
        $this->recovery      = $recovery;
        $this->authenticator = $authenticator;
    }

    /**
     * Return the seconds until the user may try
     * again, or zero when not throttled.
     *
     * @param  UserInterface $user
     * @return int
     */
    public function throttled(UserInterface $user)
    {
        if (!$this->limiter->tooManyAttempts($this->key($user), $this->maxAttempts())) {
            return 0;
        }

        return max(1, $this->limiter->availableIn($this->key($user)));
    }

    /**
     * Verify a code from any of the given methods, or a recovery
     * code. Returns the method that matched, or false.
     *
     * @param  UserInterface $user
     * @param  string        $code
     * @param  array         $methods
     * @return string|false
     */
    public function verify(UserInterface $user, $code, array $methods)
    {
        if ($this->throttled($user)) {
            return false;
        }

        $method = $this->match($user, trim((string) $code), $methods);

        if (!$method) {

            $this->limiter->hit($this->key($user), $this->decay());

            return false;
        }

        $this->limiter->clear($this->key($user));

        return $method;
    }

    /**
     * Count a failed attempt that was
     * checked outside of verify().
     *
     * @param UserInterface $user
     */
    public function fail(UserInterface $user)
    {
        $this->limiter->hit($this->key($user), $this->decay());
    }

    /**
     * Clear the user's failed attempts.
     *
     * @param UserInterface $user
     */
    public function clear(UserInterface $user)
    {
        $this->limiter->clear($this->key($user));
    }

    /**
     * Return the method a code belongs to.
     *
     * @param  UserInterface $user
     * @param  string        $code
     * @param  array         $methods
     * @return string|null
     */
    protected function match(UserInterface $user, $code, array $methods)
    {
        $digits = preg_replace('/\s+/', '', $code);

        if (preg_match('/^\d{6}$/', $digits)) {

            if (in_array('authenticator', $methods, true) && $this->authenticator->verify($user, $digits)) {
                return 'authenticator';
            }

            if (in_array('email', $methods, true) && $this->email->verify($user, $digits, 'verify')) {
                return 'email';
            }

            return null;
        }

        return $this->recovery->verify($user, $code) ? 'recovery' : null;
    }

    /**
     * Return the throttle key.
     *
     * @param  UserInterface $user
     * @return string
     */
    protected function key(UserInterface $user)
    {
        return 'anomaly.module.users::two_factor.' . $user->getId();
    }

    /**
     * Return the attempts allowed per window.
     *
     * @return int
     */
    protected function maxAttempts()
    {
        return (int) $this->config->get('anomaly.module.users::two_factor.max_attempts', 5);
    }

    /**
     * Return the throttle window in seconds.
     *
     * @return int
     */
    protected function decay()
    {
        return 60 * (int) $this->config->get('anomaly.module.users::two_factor.pending_ttl', 10);
    }
}
