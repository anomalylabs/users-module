<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Contract\AssignmentRepositoryInterface;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
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
    public function index(AssignmentTableBuilder $table, UserModel $users)
    {
        return $table
            ->setOption('stream', $users)
            ->setOption('skip', config('anomaly.module.users::config.protected_fields'))
            ->render();
    }

    /**
     * Return a form for a new field assignment.
     *
     * @param FieldAssignmentFormBuilder $form
     * @param FieldFormBuilder           $fieldForm
     * @param AssignmentFormBuilder      $assignmentForm
     * @param UserModel                  $users
     * @param null                       $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        FieldAssignmentFormBuilder $form,
        FieldFormBuilder $fieldForm,
        AssignmentFormBuilder $assignmentForm,
        UserModel $users,
        $type = null
    ) {
        $fieldForm->setOption('field_type', $type);

        return $form
            ->setOption('stream', $users)
            ->setOption('field_type', $type)
            ->addForm('field', $fieldForm)
            ->addForm('assignment', $assignmentForm)
            ->render();
    }

    /**
     * Return a form for an existing field.
     *
     * @param FieldAssignmentFormBuilder    $form
     * @param FieldFormBuilder              $fieldForm
     * @param AssignmentFormBuilder         $assignmentForm
     * @param AssignmentRepositoryInterface $assignments
     * @param                               $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(
        FieldAssignmentFormBuilder $form,
        FieldFormBuilder $fieldForm,
        AssignmentFormBuilder $assignmentForm,
        AssignmentRepositoryInterface $assignments,
        $id
    ) {
        $assignment = $assignments->find($id);
        $field      = $assignment->getField();


        return $form
            ->setOption('stream', 'users')
            ->setOption('namespace', 'users')
            ->addForm('field', $fieldForm->setEntry($field->getId()))
            ->addForm('assignment', $assignmentForm->setEntry($assignment->getId()))
            ->render();
    }
}
