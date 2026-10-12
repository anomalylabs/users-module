<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorAuthenticator;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorEmail;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorRecovery;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class TwoFactorController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorController extends PublicController
{

    /**
     * Create a new TwoFactorController instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['manage', 'disable', 'regenerate']);

        $this->middleware(
            function ($request, $next) {
                abort_unless($request->isMethod('post'), 405);

                return $next($request);
            }
        )->only(['email', 'disable', 'regenerate']);

        parent::__construct();
    }

    /**
     * Return the challenge.
     *
     * @param  TwoFactor      $twoFactor
     * @param  TwoFactorEmail $email
     * @return \Illuminate\Contracts\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function challenge(TwoFactor $twoFactor, TwoFactorEmail $email)
    {
        if (!$user = $twoFactor->subject()) {
            return $this->redirect->to('admin/login');
        }

        $context = $twoFactor->context('admin');

        if ($twoFactor->requirement($user, $context) !== 'challenge') {
            return $twoFactor->proceed($context);
        }

        $methods = $twoFactor->offeredMethods($user, $context);
        $method  = in_array($this->request->get('method'), $methods, true) ? $this->request->get('method') : $methods[0];

        if ($method === 'email' && !$email->outstanding($user, 'verify')) {
            $email->send($user, 'verify');
        }

        $this->template->set('meta_title', trans('anomaly.module.users::breadcrumb.two_factor'));

        return $this->view->make(
            'anomaly.module.users::admin/two_factor/challenge',
            compact('user', 'context', 'methods', 'method')
        );
    }

    /**
     * Return the setup.
     *
     * @param  TwoFactor              $twoFactor
     * @param  TwoFactorAuthenticator $authenticator
     * @return \Illuminate\Contracts\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function setup(TwoFactor $twoFactor, TwoFactorAuthenticator $authenticator)
    {
        if (!$user = $twoFactor->subject()) {
            return $this->redirect->to('admin/login');
        }

        if (!$twoFactor->pending() && !$this->canManage($user)) {
            abort(403);
        }

        $context = $twoFactor->context('admin');

        if (!$twoFactor->canSetUp($user, $context) || !$methods = $twoFactor->setupMethods($user, $context)) {
            return $twoFactor->proceed($context);
        }

        $method = $this->request->get('method');

        if (!in_array($method, $methods, true)) {
            $method = count($methods) === 1 ? $methods[0] : null;
        }

        $secret = $qr = null;

        if ($method === 'authenticator') {

            $enrolment = $twoFactor->enrolment($user, 'authenticator', $authenticator->generateSecret());

            $secret = decrypt($enrolment['secret']);
            $qr     = $authenticator->qrCode($user, $secret);
        }

        if ($method === 'email') {
            $twoFactor->enrolment($user, 'email');
        }

        $this->template->set('meta_title', trans('anomaly.module.users::breadcrumb.two_factor'));

        return $this->view->make(
            'anomaly.module.users::admin/two_factor/setup',
            compact('user', 'context', 'methods', 'method', 'secret', 'qr')
        );
    }

    /**
     * Email the user a code.
     *
     * @param  TwoFactor      $twoFactor
     * @param  TwoFactorEmail $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function email(TwoFactor $twoFactor, TwoFactorEmail $email)
    {
        if (!$user = $twoFactor->subject()) {
            return $this->redirect->to('admin/login');
        }

        if ($this->request->get('purpose') === 'setup') {

            $enrolment = $twoFactor->currentEnrolment($user);

            if (!$twoFactor->canSetUp($user, $twoFactor->context('admin')) || array_get($enrolment, 'method') !== 'email') {
                return $this->redirect->back();
            }

            $purpose = 'setup';
        } else {

            if (!in_array('email', $twoFactor->enrolledMethods($user), true)) {
                return $this->redirect->back();
            }

            $purpose = 'verify';
        }

        if ($wait = $email->send($user, $purpose)) {
            $this->messages->error(trans('anomaly.module.users::message.two_factor_resend_wait', ['seconds' => $wait]));
        } else {
            $this->messages->success('anomaly.module.users::message.two_factor_code_sent');
        }

        return $this->redirect->back();
    }

    /**
     * Show new recovery codes once.
     *
     * @param  TwoFactor $twoFactor
     * @return \Illuminate\Contracts\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function codes(TwoFactor $twoFactor)
    {
        if (!$codes = $twoFactor->pullCodes()) {
            return $twoFactor->proceed($twoFactor->context('admin'));
        }

        $this->template->set('meta_title', trans('anomaly.module.users::message.two_factor_codes_title'));

        return $this->view->make('anomaly.module.users::admin/two_factor/recovery_codes', compact('codes'));
    }

    /**
     * Continue after an interstitial step.
     *
     * @param  TwoFactor $twoFactor
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function proceed(TwoFactor $twoFactor)
    {
        return $twoFactor->proceed($twoFactor->context('admin'));
    }

    /**
     * Return the signed in user's
     * two-factor settings.
     *
     * @param  Guard             $auth
     * @param  TwoFactor         $twoFactor
     * @param  TwoFactorRecovery $recovery
     * @return \Illuminate\Contracts\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function manage(Guard $auth, TwoFactor $twoFactor, TwoFactorRecovery $recovery)
    {
        if (!$user = $auth->user()) {
            return $this->redirect->guest('admin/login');
        }

        if (!$this->canManage($user)) {
            abort(403);
        }

        $allowed   = $twoFactor->allowedMethods('admin');
        $enrolled  = $twoFactor->enrolledMethods($user);
        $methods   = array_values(array_unique(array_merge($allowed, $enrolled)));
        $remaining = $recovery->remaining($user);
        $mode      = $twoFactor->mode('admin');

        $this->template->set('meta_title', trans('anomaly.module.users::message.two_factor_manage'));

        return $this->view->make(
            'anomaly.module.users::admin/two_factor/manage',
            compact('user', 'allowed', 'enrolled', 'methods', 'remaining', 'mode')
        );
    }

    /**
     * Turn off one of the signed in user's methods.
     *
     * @param  Guard     $auth
     * @param  TwoFactor $twoFactor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disable(Guard $auth, TwoFactor $twoFactor)
    {
        if (!$user = $auth->user()) {
            return $this->redirect->guest('admin/login');
        }

        if (!$this->canManage($user)) {
            abort(403);
        }

        $method = $this->request->get('method');

        if (!in_array($method, $twoFactor->enrolledMethods($user), true)) {
            return $this->redirect->to('admin/two-factor/manage');
        }

        if ($twoFactor->isLastRequired($user, $method)) {

            $this->messages->error('anomaly.module.users::message.two_factor_last_method');

            return $this->redirect->to('admin/two-factor/manage');
        }

        $twoFactor->disable($user, $method);

        $this->messages->success('anomaly.module.users::message.two_factor_turned_off');

        return $this->redirect->to('admin/two-factor/manage');
    }

    /**
     * Replace the signed in user's recovery codes.
     *
     * @param  Guard             $auth
     * @param  TwoFactor         $twoFactor
     * @param  TwoFactorRecovery $recovery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function regenerate(Guard $auth, TwoFactor $twoFactor, TwoFactorRecovery $recovery)
    {
        if (!$user = $auth->user()) {
            return $this->redirect->guest('admin/login');
        }

        if (!$this->canManage($user)) {
            abort(403);
        }

        if (!$twoFactor->enrolledMethods($user)) {
            return $this->redirect->to('admin/two-factor/manage');
        }

        $twoFactor->flashCodes($recovery->generate($user));
        $twoFactor->hold('admin', 'admin/two-factor/manage');

        $this->messages->success('anomaly.module.users::message.two_factor_regenerated');

        return $this->redirect->to('admin/two-factor/recovery-codes');
    }

    /**
     * Return whether the user may manage
     * two-factor for the control panel.
     *
     * @param  UserInterface $user
     * @return bool
     */
    protected function canManage(UserInterface $user)
    {
        return app(Authorizer::class)->authorize('streams::control_panel.access', $user);
    }
}
