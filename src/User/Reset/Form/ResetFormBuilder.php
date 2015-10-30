<?php namespace Anomaly\UsersModule\Reset\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ResetFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Confirm
 */
class ResetFormBuilder extends FormBuilder
{

    /**
     * The reset code.
     *
     * @var null|string
     */
    protected $code = null;

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
     * Get the code.
     *
     * @return null|string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the code.
     *
     * @param $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
