<?php namespace Anomaly\UsersModule\User\TwoFactor\Setup;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorAuthenticator;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorEmail;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorRecovery;

/**
 * Class TwoFactorSetupFormHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorSetupFormHandler
{

    /**
     * Handle the form.
     *
     * @param TwoFactorSetupFormBuilder $builder
     * @param TwoFactor                 $twoFactor
     * @param TwoFactorAuthenticator    $authenticator
     * @param TwoFactorEmail            $email
     * @param TwoFactorRecovery         $recovery
     * @param MessageBag                $messages
     */
    public function handle(
        TwoFactorSetupFormBuilder $builder,
        TwoFactor $twoFactor,
        TwoFactorAuthenticator $authenticator,
        TwoFactorEmail $email,
        TwoFactorRecovery $recovery,
        MessageBag $messages
    ) {
        if (!$builder->canSave() || !$user = $builder->getUser()) {
            return;
        }

        $enrolment = $builder->getEnrolment();

        if ($enrolment['method'] === 'authenticator') {
            $authenticator->enable($user, $enrolment['secret'], $enrolment['step']);
        } else {
            $email->enable($user);
        }

        $twoFactor->forgetEnrolment();
        $twoFactor->pass($user, $enrolment['method']);

        $messages->success('anomaly.module.users::message.two_factor_set_up');

        $landing = $builder->isForced() ? null : 'admin/two-factor/manage';

        if (!$recovery->remaining($user)) {

            $twoFactor->flashCodes($recovery->generate($user));
            $twoFactor->hold($builder->getContext(), $landing);

            $builder->setFormResponse(redirect('admin/two-factor/recovery-codes'));

            return;
        }

        if ($landing) {

            $builder->setFormResponse(redirect($landing));

            return;
        }

        $builder->setFormResponse($twoFactor->proceed($builder->getContext()));
    }
}
