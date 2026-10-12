<?php namespace Anomaly\UsersModule\User\Impersonation;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Translation\Translator;
use Illuminate\Routing\Redirector;

/**
 * Class ImpersonationFormHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ImpersonationFormHandler
{

    /**
     * @param ImpersonationFormBuilder $builder
     * @param UserAuthenticator        $authenticator
     * @param TwoFactor                $twoFactor
     * @param Translator               $translator
     * @param Redirector               $redirector
     * @param MessageBag               $messages
     */
    public function handle(
        ImpersonationFormBuilder $builder,
        UserAuthenticator $authenticator,
        TwoFactor $twoFactor,
        Translator $translator,
        Redirector $redirector,
        MessageBag $messages
    ) {
        $authenticator->login($user = $builder->getUser());

        $twoFactor->pass($user, 'impersonation');

        $messages->success(
            $translator->trans(
                'anomaly.module.users::message.impersonating',
                [
                    'username' => $user->getUsername(),
                ]
            )
        );

        $builder->setSave(false);

        $builder->setFormResponse($redirector->to('/'));
    }
}
