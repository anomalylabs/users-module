<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

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

    public function onReady()
    {
        //$this->dispatch(new SetOptions($this));
    }
}
