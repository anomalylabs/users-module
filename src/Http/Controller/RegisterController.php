<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Register\Command\HandleActivateRequest;

/**
 * Class RegisterController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class RegisterController extends PublicController
{

    /**
     * Return the register view.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function register()
    {
        $this->template->set(
            'meta_title',
            'anomaly.module.users::breadcrumb.register'
        );

        return $this->view->make('anomaly.module.users::register');
    }

    /**
     * Activate a registered user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate()
    {
        if (!$this->dispatch(new HandleActivateRequest())) {

            $this->messages->success('anomaly.module.users::error.activate_user');

            return $this->redirect->to('/');
        }

        $this->messages->success('anomaly.module.users::success.activate_user');

        return $this->redirect->to($this->request->get('redirect', '/'));
    }
}
