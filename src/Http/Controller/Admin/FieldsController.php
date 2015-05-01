<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Form\FieldAssignmentFormBuilder;
use Anomaly\Streams\Platform\Field\Form\FieldFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\User\UserModel;

/**
 * Class FieldsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class FieldsController extends AdminController
{

    /**
     * Return an index of existing assignments.
     *
     * @param AssignmentTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssignmentTableBuilder $table, UserModel $model)
    {
        return $table
            ->setStream($model->getStream())
            ->setButtons(
                [
                    [
                        'button' => 'edit',
                        'href'   => 'admin/users/fields/edit/{entry.field_id}'
                    ]
                ]
            )
            ->setOption('skip', config('anomaly.module.users::config.protected_fields'))
            ->render();
    }

    /**
     * Return a form to create a new field.
     *
     * @param FieldFormBuilder $form
     * @param UserModel        $model
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FieldFormBuilder $form, UserModel $model)
    {
        return $form
            ->setStream($model->getStream())
            ->setOption('auto_assign', true)
            ->render();
    }

    /**
     * Return a form to edit the field.
     *
     * @param FieldFormBuilder $form
     * @param UserModel        $model
     * @param                  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FieldFormBuilder $form, UserModel $model, $id)
    {
        return $form
            ->setStream($model->getStream())
            ->render($id);
    }
}
