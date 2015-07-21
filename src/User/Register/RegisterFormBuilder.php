<?php namespace Anomaly\UsersModule\User\Register;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RegisterFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register
 */
class RegisterFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\User\UserModel';

    /**
     * The form skips.
     *
     * @var array
     */
    protected $skips = [
        'roles',
        'ip_address',
        'last_login_at',
        'remember_token',
        'last_activity_at'
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'wrapper_view' => 'anomaly.module.users::register'
    ];

    /**
     * Fired when the builder is ready.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function onReady(SettingRepositoryInterface $settings)
    {
        if ($settings->get('anomaly.module.users::allow_registration') === false) {
            abort(404);
        }
    }
}
