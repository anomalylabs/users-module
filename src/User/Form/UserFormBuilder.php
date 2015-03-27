<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class UserFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class UserFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'first_name',
        'last_name',
        'display_name',
        'username',
        'email',
        'password' => [
            'value' => ''
        ],
        'roles'
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'save'
    ];

    /**
     * Create a new UserFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $form->on(
            'validating',
            function (Form $form) {
                if ($form->getValue('password') === '') {
                    $form->getFields()->forget('password');
                };
            }
        );

        parent::__construct($form);
    }
}
