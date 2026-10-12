<?php namespace Anomaly\UsersModule\User\Validation;

use Anomaly\UsersModule\User\TwoFactor\Challenge\TwoFactorChallengeFormBuilder;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorVerifier;

/**
 * Class ValidateTwoFactorCode
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class ValidateTwoFactorCode
{

    /**
     * Handle the validation.
     *
     * @param  TwoFactorChallengeFormBuilder $builder
     * @param  TwoFactor                     $twoFactor
     * @param  TwoFactorVerifier             $verifier
     * @param                                $value
     * @return bool
     */
    public function handle(
        TwoFactorChallengeFormBuilder $builder,
        TwoFactor $twoFactor,
        TwoFactorVerifier $verifier,
        $value
    ) {
        if ($builder->isHalted()) {
            return true;
        }

        if (!$user = $builder->getUser()) {
            return false;
        }

        $method = $verifier->verify($user, $value, $twoFactor->offeredMethods($user, $builder->getContext()));

        if (!$method) {
            return false;
        }

        $builder->setMethod($method);

        return true;
    }
}
