<?php namespace Anomaly\Streams\Addon\Module\Users\Ui;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;
use Anomaly\Streams\Platform\Ui\Form\FormUi;

/**
 * Class UserFormUi
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui
 */
class UserFormUi extends FormUi
{

    /**
     * Setup the form class.
     */
    protected function boot()
    {
        $this->setUpModel();
        $this->setUpActions();
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
                    'title'  => 'General Information',
                    'fields' => [
                        'first_name',
                        'last_name',
                        'username',
                        'email',
                    ],
                ],
                [
                    'type' => 'tabbed',
                ]
            ]
        );
    }
}
 