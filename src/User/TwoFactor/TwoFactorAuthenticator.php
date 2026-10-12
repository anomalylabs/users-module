<?php namespace Anomaly\UsersModule\User\TwoFactor;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\TwoFactorWasEnabled;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Carbon\Carbon;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Encryption\DecryptException;
use PragmaRX\Google2FA\Google2FA;

/**
 * Class TwoFactorAuthenticator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorAuthenticator
{

    /**
     * The TOTP utility.
     *
     * @var Google2FA
     */
    protected $google2fa;

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
     * Create a new TwoFactorAuthenticator instance.
     *
     * @param Repository              $config
     * @param UserRepositoryInterface $users
     */
    public function __construct(Repository $config, UserRepositoryInterface $users)
    {
        $this->users     = $users;
        $this->config    = $config;
        $this->google2fa = new Google2FA();
    }

    /**
     * Generate a new 160-bit secret.
     *
     * @return string
     */
    public function generateSecret()
    {
        return $this->google2fa->generateSecretKey(32);
    }

    /**
     * Return the setup QR code as inline SVG.
     *
     * @param  UserInterface $user
     * @param  string        $secret
     * @return string
     */
    public function qrCode(UserInterface $user, $secret)
    {
        $issuer = $this->config->get('anomaly.module.users::two_factor.issuer') ?: $this->config->get('app.name');

        $writer = new Writer(new ImageRenderer(new RendererStyle(192, 1), new SvgImageBackEnd()));

        return $writer->writeString($this->google2fa->getQRCodeUrl($issuer, $user->getEmail(), $secret));
    }

    /**
     * Verify a code against the user's
     * secret, refusing replayed codes.
     *
     * @param  UserInterface $user
     * @param  string        $code
     * @return bool
     */
    public function verify(UserInterface $user, $code)
    {
        if (!$secret = $this->secret($user)) {
            return false;
        }

        $step = $this->google2fa->verifyKeyNewer($secret, $code, (int) $user->getAttribute('two_factor_last_step'));

        if ($step === false) {
            return false;
        }

        $this->users->save($user->setAttribute('two_factor_last_step', $step));

        return true;
    }

    /**
     * Verify a code against a secret being set up,
     * returning the matched time step or false.
     *
     * @param  string $secret
     * @param  string $code
     * @return int|false
     */
    public function check($secret, $code)
    {
        return $this->google2fa->verifyKeyNewer($secret, $code, 0);
    }

    /**
     * Save a confirmed secret to the user.
     *
     * @param UserInterface $user
     * @param string        $secret
     * @param int           $step
     */
    public function enable(UserInterface $user, $secret, $step)
    {
        $this->users->save(
            $user
                ->setAttribute('two_factor_secret', encrypt($secret))
                ->setAttribute('two_factor_totp_confirmed_at', Carbon::now())
                ->setAttribute('two_factor_last_step', $step)
        );

        event(new TwoFactorWasEnabled($user, 'authenticator'));
    }

    /**
     * Return the user's decrypted secret.
     *
     * @param  UserInterface $user
     * @return string|null
     */
    protected function secret(UserInterface $user)
    {
        if (!$secret = $user->getAttribute('two_factor_secret')) {
            return null;
        }

        try {
            return decrypt($secret);
        } catch (DecryptException $exception) {
            return null;
        }
    }
}
