<?php namespace Anomaly\UsersModule\User\Validation;

use Anomaly\UsersModule\User\TwoFactor\Setup\TwoFactorSetupFormBuilder;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorAuthenticator;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorEmail;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorVerifier;

/**
 * Class ValidateTwoFactorSetup
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class ValidateTwoFactorSetup
{

    /**
     * Handle the validation.
     *
     * @param  TwoFactorSetupFormBuilder $builder
     * @param  TwoFactor                 $twoFactor
     * @param  TwoFactorVerifier         $verifier
     * @param  TwoFactorAuthenticator    $authenticator
     * @param  TwoFactorEmail            $email
     * @param                            $value
     * @return bool
     */
    public function handle(
        TwoFactorSetupFormBuilder $builder,
        TwoFactor $twoFactor,
        TwoFactorVerifier $verifier,
        TwoFactorAuthenticator $authenticator,
        TwoFactorEmail $email,
        $value
    ) {
        if ($builder->isHalted()) {
            return true;
        }

        if (!$user = $builder->getUser()) {
            return false;
        }

        $enrolment = $twoFactor->currentEnrolment($user);

        if (!$enrolment || !in_array($enrolment['method'], $twoFactor->setupMethods($user, $builder->getContext()), true)) {
            return false;
        }

        $code = preg_replace('/\s+/', '', (string) $value);

        if ($enrolment['method'] === 'authenticator') {
            $step = $enrolment['secret'] ? $authenticator->check($enrolment['secret'], $code) : false;
        } else {
            $step = $email->verify($user, $code, 'setup') ? 0 : false;
        }

        if ($step === false) {

            $verifier->fail($user);

            return false;
        }

        $verifier->clear($user);

        $builder->setEnrolment($enrolment + ['step' => $step]);

        return true;
    }
}
