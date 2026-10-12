<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserSecurity;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LoginFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class LoginFormBuilder extends FormBuilder
{

    /**
     * No model.
     *
     * @var bool
     */
    protected $model = false;

    /**
     * The user instance. This is set
     * after a successful login
     * has validated.
     *
     * @var null|UserInterface
     */
    protected $user = null;

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'blue' => [
            'text' => 'anomaly.module.users::button.login',
        ],
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'redirect'        => '/',
        'breadcrumb'      => false,
        'success_message' => false,
    ];

    /**
     * Fired when the form is ready.
     */
    public function onReady()
    {
        if (!$this->isAvailable()) {
            $this->setFormResponse(new Response('', 404));
        }
    }

    /**
     * Fired when the form is posting.
     *
     * @param UserSecurity $security
     */
    public function onPost(UserSecurity $security)
    {
        if (!$this->isAvailable()) {
            abort(404);
        }

        $response = $security->attempt();

        if ($response instanceof Response) {

            $this->setFormResponse($response);

            $this->setSave(false);
        }
    }

    /**
     * Return the login context, admin or public.
     *
     * Forms without a context option are treated
     * as admin when they redirect into the admin.
     *
     * @return string
     */
    public function getContext()
    {
        if ($context = $this->getOption('context')) {
            return $context === 'admin' ? 'admin' : 'public';
        }

        $redirect = ltrim((string) $this->getOption('redirect'), '/');

        return $redirect === 'admin' || Str::startsWith($redirect, 'admin/') ? 'admin' : 'public';
    }

    /**
     * Return whether the login
     * is available in its context.
     *
     * @return bool
     */
    public function isAvailable()
    {
        return $this->getContext() === 'admin' || config('anomaly.module.users::config.public_login', true);
    }

    /**
     * Return whether the user may
     * log in through this form.
     *
     * @param  UserInterface $user
     * @return bool
     */
    public function admits(UserInterface $user)
    {
        if ($this->getContext() !== 'admin' || config('anomaly.module.users::config.public_login', true)) {
            return true;
        }

        return app(Authorizer::class)->authorize('streams::control_panel.access', $user);
    }

    /**
     * Get the user.
     *
     * @return UserInterface|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param  UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}
