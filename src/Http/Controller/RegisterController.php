<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Register\Command\ActivateUser;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
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
        return $this->view->make('anomaly.module.users::register');
    }

    public function activate(SettingRepositoryInterface $settings)
    {
        if ($this->dispatch(new ActivateUser())) {

            $message = $settings->value(
                'anomaly.module.users::activated_message',
                'anomaly.module.users::success.activate_user'
            );

            if (filter_var($message)) {
                $this->messages->success($message);
            }

            return $this->redirect->to($settings->value('anomaly.module.users::activated_redirect', '/'));
        }

        $this->messages->success('anomaly.module.users::error.activate_user');

        return $this->redirect->to('/');
    }
}
