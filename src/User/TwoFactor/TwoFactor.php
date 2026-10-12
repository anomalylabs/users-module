<?php namespace Anomaly\UsersModule\User\TwoFactor;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Event\TwoFactorWasDisabled;
use Anomaly\UsersModule\User\Event\TwoFactorWasReset;
use Anomaly\UsersModule\User\UserAuthenticator;
use Anomaly\UsersModule\User\UserSecurity;
use Illuminate\Auth\Recaller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TwoFactor
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactor
{

    /**
     * The available methods.
     */
    const METHODS = ['authenticator', 'email'];

    /**
     * The session keys.
     */
    const SESSION = 'users.two_factor';

    const PENDING = 'users.two_factor.pending';

    const PASSED = 'users.two_factor.passed';

    const ENROL = 'users.two_factor.enrol';

    const CODES = 'users.two_factor.codes';

    const LANDING = 'users.two_factor.landing';

    /**
     * The auth guard.
     *
     * @var \Illuminate\Auth\SessionGuard
     */
    protected $auth;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new TwoFactor instance.
     *
     * @param Guard                   $auth
     * @param Repository              $config
     * @param Request                 $request
     * @param Authorizer              $authorizer
     * @param UserRepositoryInterface $users
     */
    public function __construct(
        Guard $auth,
        Repository $config,
        Request $request,
        Authorizer $authorizer,
        UserRepositoryInterface $users
    ) {
        $this->auth       = $auth;
        $this->users      = $users;
        $this->config     = $config;
        $this->request    = $request;
        $this->authorizer = $authorizer;
    }

    /**
     * Return the mode for a context: off, optional or required.
     *
     * @param  string $context
     * @return string
     */
    public function mode($context)
    {
        $mode = $this->config->get("anomaly.module.users::two_factor.{$context}", 'off');

        return in_array($mode, ['optional', 'required'], true) ? $mode : 'off';
    }

    /**
     * Return the methods a context allows.
     *
     * @param  string $context
     * @return array
     */
    public function allowedMethods($context)
    {
        $methods = (array) $this->config->get("anomaly.module.users::two_factor.{$context}_methods", []);

        return array_values(array_intersect(self::METHODS, $methods)) ?: ['authenticator'];
    }

    /**
     * Return whether a context applies to the user.
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @return bool
     */
    public function inScope(UserInterface $user, $context)
    {
        if ($context === 'admin') {
            return $this->authorizer->authorize('streams::control_panel.access', $user);
        }

        return true;
    }

    /**
     * Return the methods the user has confirmed.
     *
     * @param  UserInterface $user
     * @return array
     */
    public function enrolledMethods(UserInterface $user)
    {
        $methods = [];

        if ($user->getAttribute('two_factor_totp_confirmed_at') && $user->getAttribute('two_factor_secret')) {
            $methods[] = 'authenticator';
        }

        if ($user->getAttribute('two_factor_email_confirmed_at')) {
            $methods[] = 'email';
        }

        return $methods;
    }

    /**
     * Return the user's methods that the context allows.
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @return array
     */
    public function usableMethods(UserInterface $user, $context)
    {
        return array_values(array_intersect($this->enrolledMethods($user), $this->allowedMethods($context)));
    }

    /**
     * Return the methods to challenge the user with. When none of
     * the user's methods is allowed in the context, any of them
     * proves who they are before they set up an allowed one.
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @return array
     */
    public function offeredMethods(UserInterface $user, $context)
    {
        return $this->usableMethods($user, $context) ?: $this->enrolledMethods($user);
    }

    /**
     * Return the allowed methods the user has not set up yet.
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @return array
     */
    public function setupMethods(UserInterface $user, $context)
    {
        return array_values(array_diff($this->allowedMethods($context), $this->enrolledMethods($user)));
    }

    /**
     * Return what the user still needs before
     * the context is open to them: null,
     * "challenge" or "setup".
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @return null|string
     */
    public function requirement(UserInterface $user, $context)
    {
        if ($this->mode($context) === 'off' || !$this->inScope($user, $context)) {
            return null;
        }

        $passed = $this->passed($user);

        if ($passed === 'impersonation') {
            return null;
        }

        if (!$this->enrolledMethods($user)) {
            return $this->mode($context) === 'required' ? 'setup' : null;
        }

        if (!$this->usableMethods($user, $context)) {
            return $passed ? 'setup' : 'challenge';
        }

        return in_array($passed, array_merge($this->allowedMethods($context), ['recovery']), true) ? null : 'challenge';
    }

    /**
     * Return whether the user may set up
     * a method in the context right now.
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @return bool
     */
    public function canSetUp(UserInterface $user, $context)
    {
        $requirement = $this->requirement($user, $context);

        if ($this->pending()) {
            return $requirement === 'setup';
        }

        return $requirement !== 'challenge';
    }

    /**
     * Return whether turning off a method would leave
     * the user without one the control panel needs.
     *
     * @param  UserInterface $user
     * @param  string        $method
     * @return bool
     */
    public function isLastRequired(UserInterface $user, $method)
    {
        return $this->mode('admin') === 'required'
            && $this->inScope($user, 'admin')
            && $this->usableMethods($user, 'admin') === [$method];
    }

    /**
     * Hold a password login until a second factor is
     * passed, when the context needs one. Returns
     * the response to send, or null to log in.
     *
     * @param  UserInterface $user
     * @param  string        $context
     * @param  bool          $remember
     * @param  string        $redirect
     * @return Response|null
     */
    public function intercept(UserInterface $user, $context, $remember, $redirect)
    {
        session()->forget(self::SESSION);

        if (!$this->requirement($user, $context)) {
            return null;
        }

        session()->put(
            self::PENDING,
            [
                'id'         => (int) $user->getId(),
                'context'    => $context,
                'remember'   => (bool) $remember,
                'redirect'   => $redirect,
                'expires_at' => time() + 60 * (int) $this->config->get('anomaly.module.users::two_factor.pending_ttl', 10),
            ]
        );

        session()->migrate(true);

        return $this->proceed($context);
    }

    /**
     * Return the pending login, if it has not expired.
     *
     * @return array|null
     */
    public function pending()
    {
        if (!$pending = session(self::PENDING)) {
            return null;
        }

        if (array_get($pending, 'expires_at', 0) < time()) {

            session()->forget(self::SESSION);

            return null;
        }

        return $pending;
    }

    /**
     * Return the user being verified: the
     * pending login, or the signed in user.
     *
     * @return UserInterface|null
     */
    public function subject()
    {
        if ($pending = $this->pending()) {
            return $this->users->find($pending['id']);
        }

        return $this->auth->user();
    }

    /**
     * Return the context being verified.
     *
     * @param  string $default
     * @return string
     */
    public function context($default = 'admin')
    {
        if ($pending = $this->pending()) {
            return $pending['context'];
        }

        return $default;
    }

    /**
     * Return the method the user passed in this session.
     *
     * @param  UserInterface $user
     * @return string|null
     */
    public function passed(UserInterface $user)
    {
        $passed = session(self::PASSED);

        if (!$passed || (int) array_get($passed, 'id') !== (int) $user->getId()) {
            return null;
        }

        return array_get($passed, 'method');
    }

    /**
     * Record a passed factor for this session.
     *
     * @param UserInterface $user
     * @param string        $method
     */
    public function pass(UserInterface $user, $method)
    {
        session()->put(
            self::PASSED,
            [
                'id'     => (int) $user->getId(),
                'method' => $method,
            ]
        );
    }

    /**
     * Continue once a step is done: on to the next
     * step, or finish the login and move on.
     *
     * @param  string $context
     * @return Response
     */
    public function proceed($context = 'admin')
    {
        if (!$user = $this->subject()) {

            app(MessageBag::class)->error('anomaly.module.users::message.two_factor_expired');

            return redirect($this->loginUrl($context));
        }

        $pending = $this->pending();

        if ($pending) {
            $context = $pending['context'];
        }

        if ($requirement = $this->requirement($user, $context)) {
            return redirect($this->url($requirement, $context));
        }

        $landing = session()->pull(self::LANDING) ?: ($pending ? $pending['redirect'] : $this->home($context));

        if ($pending) {
            return $this->login($user, $pending, $landing);
        }

        if ($this->recalled($user)) {
            $this->remember($user);
        }

        session()->migrate(true);

        return redirect()->intended($landing);
    }

    /**
     * Remember where to go after an
     * interstitial step, like the
     * recovery codes page.
     *
     * @param string      $context
     * @param string|null $landing
     */
    public function hold($context = 'admin', $landing = null)
    {
        $pending = $this->pending();

        session()->put(self::LANDING, $landing ?: ($pending ? $pending['redirect'] : $this->home($context)));
    }

    /**
     * Finish a pending login.
     *
     * @param  UserInterface $user
     * @param  array         $pending
     * @param  string        $landing
     * @return Response
     */
    protected function login(UserInterface $user, array $pending, $landing)
    {
        session()->forget(self::PENDING);

        $response = app(UserSecurity::class)->check($user);

        if ($response instanceof Response) {

            session()->forget(self::SESSION);

            return $response;
        }

        app(UserAuthenticator::class)->login($user, $pending['remember']);

        if ($pending['remember']) {
            $this->remember($user);
        }

        return redirect()->intended($landing);
    }

    /**
     * Return the URL for a requirement.
     *
     * @param  string $requirement
     * @param  string $context
     * @return string
     */
    public function url($requirement, $context = 'admin')
    {
        return $requirement === 'setup' ? 'admin/two-factor/setup' : 'admin/two-factor';
    }

    /**
     * Return the login URL for a context.
     *
     * @param  string $context
     * @return string
     */
    public function loginUrl($context = 'admin')
    {
        return $context === 'admin' ? 'admin/login' : 'login';
    }

    /**
     * Return the landing page for a context.
     *
     * @param  string $context
     * @return string
     */
    public function home($context = 'admin')
    {
        return $context === 'admin' ? 'admin' : '/';
    }

    /**
     * Hold a method's enrolment for the user,
     * starting a new one where needed.
     *
     * @param  UserInterface $user
     * @param  string        $method
     * @param  string|null   $secret
     * @return array
     */
    public function enrolment(UserInterface $user, $method, $secret = null)
    {
        $enrolment = session(self::ENROL);

        if (
            !$enrolment
            || (int) array_get($enrolment, 'id') !== (int) $user->getId()
            || array_get($enrolment, 'method') !== $method
        ) {
            $enrolment = [
                'id'     => (int) $user->getId(),
                'method' => $method,
                'secret' => $secret ? encrypt($secret) : null,
            ];

            session()->put(self::ENROL, $enrolment);
        }

        return $enrolment;
    }

    /**
     * Return the user's enrolment in progress.
     *
     * @param  UserInterface $user
     * @return array|null
     */
    public function currentEnrolment(UserInterface $user)
    {
        $enrolment = session(self::ENROL);

        if (!$enrolment || (int) array_get($enrolment, 'id') !== (int) $user->getId()) {
            return null;
        }

        if ($secret = array_get($enrolment, 'secret')) {
            $enrolment['secret'] = decrypt($secret);
        }

        return $enrolment;
    }

    /**
     * Forget the enrolment in progress.
     */
    public function forgetEnrolment()
    {
        session()->forget(self::ENROL);
    }

    /**
     * Hold recovery codes to show once.
     *
     * @param array $codes
     */
    public function flashCodes(array $codes)
    {
        session()->put(self::CODES, encrypt($codes));
    }

    /**
     * Pull the recovery codes to show.
     *
     * @return array
     */
    public function pullCodes()
    {
        $codes = session()->pull(self::CODES);

        return $codes ? decrypt($codes) : [];
    }

    /**
     * Turn off one of the user's methods.
     *
     * @param UserInterface $user
     * @param string        $method
     */
    public function disable(UserInterface $user, $method)
    {
        if ($method === 'authenticator') {
            $user
                ->setAttribute('two_factor_secret', null)
                ->setAttribute('two_factor_totp_confirmed_at', null)
                ->setAttribute('two_factor_last_step', null);
        }

        if ($method === 'email') {
            $user->setAttribute('two_factor_email_confirmed_at', null);
        }

        if (!$this->enrolledMethods($user)) {
            $user->setAttribute('two_factor_recovery_codes', null);
        }

        $this->users->save($user);

        $this->cycle($user);

        event(new TwoFactorWasDisabled($user, $method));
    }

    /**
     * Turn off all of the user's methods.
     *
     * @param UserInterface $user
     */
    public function reset(UserInterface $user)
    {
        $this->users->save(
            $user
                ->setAttribute('two_factor_secret', null)
                ->setAttribute('two_factor_totp_confirmed_at', null)
                ->setAttribute('two_factor_email_confirmed_at', null)
                ->setAttribute('two_factor_recovery_codes', null)
                ->setAttribute('two_factor_last_step', null)
        );

        $this->cycle($user);

        event(new TwoFactorWasReset($user));
    }

    /**
     * Replace the user's remember token, ending
     * every remembered login on every device.
     *
     * @param UserInterface $user
     */
    public function cycle(UserInterface $user)
    {
        $this->auth->getProvider()->updateRememberToken($user, Str::random(60));
    }

    /**
     * Return the remember cookie name.
     *
     * @return string
     */
    public function cookieName()
    {
        return 'two_factor_' . $this->auth->getRecallerName();
    }

    /**
     * Remember the passed factor for as
     * long as the remembered login.
     *
     * @param UserInterface $user
     */
    public function remember(UserInterface $user)
    {
        $method = $this->passed($user);

        if (!$method || $method === 'impersonation' || !$user->getRememberToken()) {
            return;
        }

        $guard = $this->config->get('auth.defaults.guard', 'web');

        Cookie::queue(
            $this->cookieName(),
            implode('|', [$user->getId(), $method, $this->sign($user, $method)]),
            (int) $this->config->get("auth.guards.{$guard}.remember", 576000)
        );
    }

    /**
     * Pass the factor recorded in the remember cookie when
     * this request signed the user in from their recaller.
     *
     * @param  UserInterface $user
     * @return bool
     */
    public function trustRemembered(UserInterface $user)
    {
        if ($this->passed($user) || !$this->auth->viaRemember() || !$user->getRememberToken()) {
            return false;
        }

        $parts = explode('|', (string) $this->request->cookies->get($this->cookieName()), 3);

        if (count($parts) !== 3) {
            return false;
        }

        list($id, $method, $signature) = $parts;

        if ((int) $id !== (int) $user->getId()) {
            return false;
        }

        if (!in_array($method, array_merge($this->enrolledMethods($user), ['recovery']), true)) {
            return false;
        }

        if (!hash_equals($this->sign($user, $method), $signature)) {
            return false;
        }

        $this->pass($user, $method);

        return true;
    }

    /**
     * Return whether the request carries a
     * valid recaller cookie for the user.
     *
     * @param  UserInterface $user
     * @return bool
     */
    public function recalled(UserInterface $user)
    {
        $recaller = new Recaller((string) $this->request->cookies->get($this->auth->getRecallerName()));

        if (
            !$recaller->valid()
            || (int) $recaller->id() !== (int) $user->getId()
            || !$user->getRememberToken()
            || !hash_equals((string) $user->getRememberToken(), (string) $recaller->token())
        ) {
            return false;
        }

        $password = (string) $user->getAuthPassword();

        return hash_equals($this->auth->hashPasswordForCookie($password), (string) $recaller->hash())
            || hash_equals($password, (string) $recaller->hash());
    }

    /**
     * Forget the session's two-factor
     * state and remember cookie.
     */
    public function forget()
    {
        session()->forget(self::SESSION);

        Cookie::queue(Cookie::forget($this->cookieName()));
    }

    /**
     * Sign a remembered factor. The signature fails once
     * the remember token is cycled or the method is
     * set up again.
     *
     * @param  UserInterface $user
     * @param  string        $method
     * @return string
     */
    protected function sign(UserInterface $user, $method)
    {
        $confirmed = [
            'authenticator' => 'two_factor_totp_confirmed_at',
            'email'         => 'two_factor_email_confirmed_at',
        ];

        $payload = implode(
            '|',
            [
                $user->getId(),
                $method,
                $user->getRememberToken(),
                isset($confirmed[$method]) ? (string) $user->getRawOriginal($confirmed[$method]) : '',
            ]
        );

        return hash_hmac('sha256', $payload, $this->config->get('app.key'));
    }
}
