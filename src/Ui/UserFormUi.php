<?php namespace Anomaly\Streams\Addon\Module\Users\Ui;

use Anomaly\Streams\Platform\Ui\Form\FormUi;
use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class UserFormUi extends FormUi
{

    protected function boot()
    {
        $this->setUpModel();
        $this->setUpActions();
        $this->setUpSections();
        $this->setUpRedirects();
    }

    protected function setUpModel()
    {
        $this->setModel(new UserModel());
    }

    protected function setUpRedirects()
    {
        $this->setRedirects(
            [
                'save',
            ]
        );
    }

    protected function setUpActions()
    {
        $this->setActions(
            [
                'cancel',
                'delete',
            ]
        );
    }

    protected function setUpSections()
    {
        $this->setSections(
            [
                [
                    'title'  => 'General Information',
                    'fields' => [
                        'first_name',
                        'last_name',
                    ],
                ],
                [
                    'type' => 'tabbed',
                ]
            ]
        );
    }

}
 