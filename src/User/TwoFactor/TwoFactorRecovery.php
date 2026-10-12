<?php namespace Anomaly\UsersModule\User\TwoFactor;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\RecoveryCodeWasUsed;
use Illuminate\Contracts\Config\Repository;

/**
 * Class TwoFactorRecovery
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorRecovery
{

    /**
     * The code alphabet, without
     * look-alike characters.
     */
    const ALPHABET = 'abcdefghjkmnpqrstuvwxyz23456789';

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
     * Create a new TwoFactorRecovery instance.
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
     * Replace the user's recovery codes,
     * returning the new codes.
     *
     * @param  UserInterface $user
     * @return array
     */
    public function generate(UserInterface $user)
    {
        $codes = [];

        for ($i = 0; $i < (int) $this->config->get('anomaly.module.users::two_factor.recovery_codes', 8); $i++) {

            $code = '';

            for ($j = 0; $j < 10; $j++) {
                $code .= self::ALPHABET[random_int(0, strlen(self::ALPHABET) - 1)];
            }

            $codes[] = substr($code, 0, 5) . '-' . substr($code, 5);
        }

        $this->users->save(
            $user->setAttribute(
                'two_factor_recovery_codes',
                json_encode(array_map([$this, 'hash'], $codes))
            )
        );

        return $codes;
    }

    /**
     * Return how many codes the user has left.
     *
     * @param  UserInterface $user
     * @return int
     */
    public function remaining(UserInterface $user)
    {
        return count($this->hashes($user));
    }

    /**
     * Use up a recovery code.
     *
     * @param  UserInterface $user
     * @param  string        $code
     * @return bool
     */
    public function verify(UserInterface $user, $code)
    {
        $hash   = $this->hash($code);
        $hashes = $this->hashes($user);

        foreach ($hashes as $key => $stored) {
            if (hash_equals((string) $stored, $hash)) {

                unset($hashes[$key]);

                $this->users->save(
                    $user->setAttribute('two_factor_recovery_codes', json_encode(array_values($hashes)))
                );

                event(new RecoveryCodeWasUsed($user));

                return true;
            }
        }

        return false;
    }

    /**
     * Return the user's stored code hashes.
     *
     * @param  UserInterface $user
     * @return array
     */
    protected function hashes(UserInterface $user)
    {
        return (array) json_decode((string) $user->getAttribute('two_factor_recovery_codes'), true);
    }

    /**
     * Hash a code, ignoring case,
     * spaces and dashes.
     *
     * @param  string $code
     * @return string
     */
    public function hash($code)
    {
        $code = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', (string) $code));

        return hash_hmac('sha256', $code, $this->config->get('app.key'));
    }
}
