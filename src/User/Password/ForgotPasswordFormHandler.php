<?php namespace Anomaly\UsersModule\User\Password;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserPassword;
use Illuminate\Cache\RateLimiter;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

/**
 * Class ForgotPasswordFormHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ForgotPasswordFormHandler
{

    /**
     * Handle the form.
     *
     * @param ForgotPasswordFormBuilder $builder
     * @param UserRepositoryInterface   $users
     * @param UserPassword              $password
     * @param MessageBag                $messages
     * @param Repository                $config
     * @param RateLimiter               $limiter
     * @param Request                   $request
     */
    public function handle(
        ForgotPasswordFormBuilder $builder,
        UserRepositoryInterface $users,
        UserPassword $password,
        MessageBag $messages,
        Repository $config,
        RateLimiter $limiter,
        Request $request
    ) {
        if ($builder->hasFormErrors()) {
            return;
        }

        $key = 'anomaly.module.users::forgot.' . $request->ip();

        if ($limiter->tooManyAttempts($key, $config->get('anomaly.module.users::config.reset_attempts'))) {

            $messages->error(
                trans('anomaly.module.users::error.throttled', ['seconds' => $limiter->availableIn($key)])
            );

            return;
        }

        $limiter->hit($key, $config->get('anomaly.module.users::config.reset_decay'));

        $user = $users->findByEmail($builder->getFormValue('email'));

        if ($path = $builder->getFormOption('reset_path')) {
            $config->set('anomaly.module.users::paths.reset', $path);
        }

        if ($user) {
            $password->forgot($user);
            $password->send($user, $builder->getFormOption('reset_redirect'));
        }

        $messages->success($builder->getFormOption('success_message'));
    }
}
