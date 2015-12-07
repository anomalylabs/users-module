<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;

/**
 * Class CompleteResetFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset
 */
class CompleteResetFormBuilder extends FormBuilder
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
     * Fired just before building.
     *
     * @param Encrypter $encrypter
     * @param Request   $request
     */
    public function onReady(Encrypter $encrypter, Request $request)
    {
        if (!$this->getCode()) {
            $this->setCode($encrypter->decrypt($request->get('code')));
        }

        if (!$this->getEmail()) {
            $this->setEmail($encrypter->decrypt($request->get('email')));
        }
    }

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
