<?php namespace Anomaly\UsersModule\User\Password;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Encryption\Encrypter;

/**
 * Class ResetPasswordFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Password
 */
class ResetPasswordFormBuilder extends FormBuilder
{

    /**
     * The reset code.
     *
     * @var null|string
     */
    protected $code = null;

    /**
     * The user email.
     *
     * @var null|string
     */
    protected $email = null;

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

    /**
     * Get the email.
     *
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the email.
     *
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

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
