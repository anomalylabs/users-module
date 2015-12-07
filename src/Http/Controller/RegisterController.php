<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Register\Command\HandleActivateRequest;
use Illuminate\Contracts\Encryption\Encrypter;

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
     * Activate a registered user.
     *
     * @param SettingRepositoryInterface $settings
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(SettingRepositoryInterface $settings)
    {
        if (!$this->dispatch(new HandleActivateRequest())) {

            $this->messages->success('anomaly.module.users::error.activate_user');

            return $this->redirect->to($settings->value('anomaly.module.users::activated_redirect', '/'));
        }

        $this->messages->success('anomaly.module.users::success.activate_user');

        return $this->redirect->to($this->request->get('redirect', '/'));
    }
}
