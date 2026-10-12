<?php namespace Anomaly\UsersModule\User\TwoFactor\Challenge;

use Anomaly\UsersModule\User\TwoFactor\TwoFactor;

/**
 * Class TwoFactorChallengeFormHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorChallengeFormHandler
{

    /**
     * Handle the form.
     *
     * @param TwoFactorChallengeFormBuilder $builder
     * @param TwoFactor                     $twoFactor
     */
    public function handle(TwoFactorChallengeFormBuilder $builder, TwoFactor $twoFactor)
    {
        if (!$builder->canSave() || !$user = $builder->getUser()) {
            return;
        }

        $twoFactor->pass($user, $builder->getMethod());

        $builder->setFormResponse($twoFactor->proceed($builder->getContext()));
    }
}
