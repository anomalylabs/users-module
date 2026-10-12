<?php namespace Anomaly\UsersModule\User\Validation;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class ValidateTwoFactorSetting
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class ValidateTwoFactorSetting
{

    /**
     * Handle the validation.
     *
     * @param  FormBuilder $builder
     * @param  TwoFactor   $twoFactor
     * @param  Guard       $auth
     * @param              $value
     * @return bool
     */
    public function handle(FormBuilder $builder, TwoFactor $twoFactor, Guard $auth, $value)
    {
        if ($value !== 'required') {
            return true;
        }

        if (!$user = $auth->user()) {
            return false;
        }

        $methods = TwoFactor::METHODS;

        if ($field = $builder->getFormField('two_factor_admin_methods')) {
            $methods = (array) $field->getPostValue();
        }

        return (bool) array_intersect($twoFactor->enrolledMethods($user), $methods);
    }
}
