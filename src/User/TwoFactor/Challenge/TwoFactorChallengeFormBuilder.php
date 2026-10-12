<?php namespace Anomaly\UsersModule\User\TwoFactor\Challenge;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Anomaly\UsersModule\User\TwoFactor\TwoFactorVerifier;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TwoFactorChallengeFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class TwoFactorChallengeFormBuilder extends FormBuilder
{

    /**
     * No model.
     *
     * @var bool
     */
    protected $model = false;

    /**
     * The user being verified.
     *
     * @var null|UserInterface
     */
    protected $user = null;

    /**
     * The method the code matched.
     *
     * @var null|string
     */
    protected $method = null;

    /**
     * Whether the post was stopped
     * before the code was checked.
     *
     * @var bool
     */
    protected $halted = false;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'code' => [
            'label'       => 'anomaly.module.users::field.two_factor_code.name',
            'placeholder' => 'anomaly.module.users::field.two_factor_code.placeholder',
            'type'        => 'anomaly.field_type.text',
            'required'    => true,
            'attributes'  => [
                'autocomplete' => 'one-time-code',
            ],
            'rules'       => [
                'valid_two_factor_code',
            ],
            'validators'  => [
                'valid_two_factor_code' => [
                    'handler' => 'Anomaly\UsersModule\User\Validation\ValidateTwoFactorCode@handle',
                    'message' => 'anomaly.module.users::error.two_factor_code',
                ],
            ],
        ],
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'blue' => [
            'text' => 'anomaly.module.users::button.verify',
        ],
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'context'         => 'admin',
        'breadcrumb'      => false,
        'success_message' => false,
    ];

    /**
     * Fired when the form is ready.
     *
     * @param TwoFactor $twoFactor
     */
    public function onReady(TwoFactor $twoFactor)
    {
        if (!$twoFactor->subject()) {
            $this->setFormResponse(new Response('', 404));
        }
    }

    /**
     * Fired when the form is posting.
     *
     * @param TwoFactor         $twoFactor
     * @param TwoFactorVerifier $verifier
     * @param MessageBag        $messages
     */
    public function onPost(TwoFactor $twoFactor, TwoFactorVerifier $verifier, MessageBag $messages)
    {
        if (!$user = $twoFactor->subject()) {

            $this->halt($twoFactor->proceed($this->getContext()));

            return;
        }

        if ($seconds = $verifier->throttled($user)) {

            $messages->error(trans('anomaly.module.users::error.throttled', ['seconds' => $seconds]));

            if ($twoFactor->pending()) {

                session()->forget(TwoFactor::SESSION);

                $this->halt(redirect($twoFactor->loginUrl($this->getContext())));

                return;
            }

            $this->halt(redirect()->back());

            return;
        }

        $this->setUser($user);
    }

    /**
     * Stop the post with a response.
     *
     * @param Response $response
     */
    protected function halt(Response $response)
    {
        $this->halted = true;

        $this->setSave(false);
        $this->setFormResponse($response);
    }

    /**
     * Return whether the post was halted.
     *
     * @return bool
     */
    public function isHalted()
    {
        return $this->halted;
    }

    /**
     * Return the context being verified.
     *
     * @return string
     */
    public function getContext()
    {
        return app(TwoFactor::class)->context($this->getOption('context') === 'public' ? 'public' : 'admin');
    }

    /**
     * Get the user.
     *
     * @return UserInterface|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param  UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the method.
     *
     * @return string|null
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the method.
     *
     * @param  string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }
}
