<?php namespace Anomaly\UsersModule\User\Password;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Config\Repository;

/**
 * Class ForgotPasswordFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Confirm
 */
class ForgotPasswordFormBuilder extends FormBuilder
{

    /**
     * No model.
     *
     * @var bool
     */
    protected $model = false;

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'submit'
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'redirect'            => '/',
        'panel_class'         => '',
        'panel_body_class'    => '',
        'panel_title_class'   => '',
        'panel_heading_class' => ''
    ];
}
