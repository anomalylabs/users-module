<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Form;

use Anomaly\Streams\Addon\Module\Users\Role\RoleModel;
use Anomaly\Streams\Platform\Ui\Form\Form;

class RoleForm extends Form
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
        $this->setModel(new RoleModel());
    }

    /**
     * Set up form actions.
     */
    protected function setUpRedirects()
    {
        $this->setActions(
            [
                'save',
            ]
        );
    }

    /**
     * Set up the form buttons.
     */
    protected function setUpActions()
    {
        $this->setButtons(
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
                    'fields' => [
                        'name',
                        'slug',
                        'permissions',
                    ],
                ],
            ]
        );
    }
}
 