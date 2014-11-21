<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Form;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;
use Anomaly\Streams\Platform\Ui\Form\Form;

/**
 * Class UserForm
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui
 */
class UserForm extends Form
{

    /**
     * Setup the form class.
     */
    protected function boot()
    {
        $this->setUpModel();
        $this->setUpSkips();
        $this->setUpActions();
        $this->setUpIncludes();
        $this->setUpSections();
        $this->setUpRedirects();
    }

    /**
     * Set up the model.
     */
    protected function setUpModel()
    {
        $this->setModel(new UserModel());
    }

    /**
     * Set up the skipped fields.
     */
    protected function setUpSkips()
    {
        $this->setSkips(
            [
                'persistence_code',
                'last_activity_at',
                'activation_code',
                'last_login_at',
                'is_activated',
                'activated_at',
                'reset_code',
                'is_blocked',
                'blocked_at',
            ]
        );
    }

    /**
     * Set up form redirects.
     */
    protected function setUpRedirects()
    {
        $this->setRedirects(
            [
                'save',
            ]
        );
    }

    /**
     * Set up the form actions.
     */
    protected function setUpActions()
    {
        $this->setActions(
            [
                'cancel',
                'delete',
            ]
        );
    }

    /**
     * Set up the form sections.
     */
    protected function setUpSections()
    {
        $this->setSections(
            [
                [
                    'type'   => 'default',
                    'title'  => 'User Information',
                    'fields' => [
                        'username',
                        'email',
                        'roles',
                        'password',
                        'password_confirmation' => [
                            'label'        => 'module.users::field.password_confirmation.label',
                            'instructions' => 'module.users::field.password_confirmation.instructions',
                            'type'         => 'text',
                        ]
                    ]
                ]
            ]
        );
    }

    /**
     * Set up included non-stream fields.
     */
    protected function setUpIncludes()
    {
        $this->setInclude(
            [
                'password_confirmation',
            ]
        );
    }
}
 