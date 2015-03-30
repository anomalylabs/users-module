<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Assignment\AssignmentModel;
use Anomaly\Streams\Platform\Assignment\Contract\AssignmentInterface;
use Anomaly\Streams\Platform\Field\FieldModel;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\StreamRepository;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
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
     * Return an index of existing fields.
     *
     * @param TableBuilder $builder
     * @param UserModel    $users
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(TableBuilder $builder, UserModel $users)
    {
        $stream = $users->getStream();

        $builder->setModel(new AssignmentModel());

        $builder->setColumns(
            [
                [
                    'heading' => 'Field',
                    'value'   => function (AssignmentInterface $entry) {
                        return trans($entry->getFieldName());
                    }
                ],
                [
                    'heading' => 'Slug',
                    'value'   => 'entry.field.slug'
                ],
                [
                    'heading' => 'Type',
                    'value'   => 'entry.field.type'
                ]
            ]
        );

        $builder->setButtons(['edit']);
        $builder->setActions(['delete']);

        $table = $builder->getTable();

        $table->setEntries(
            $stream->getAssignments()->withoutFields(config('anomaly.module.users::config.protected_fields'))
        );

        return $builder->render();
    }

    /**
     * Return a field for a new field.
     *
     * @param FormBuilder $builder
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(FormBuilder $builder)
    {
        $builder->setModel(new FieldModel());

        $builder->setFields(
            [
                'type'         => [
                    'label'  => 'Field Type',
                    'type'   => 'anomaly.field_type.select',
                    'config' => [
                        'options' => function (FieldTypeCollection $fieldTypes) {

                            $options = [];

                            /* @var FieldType $fieldType */
                            foreach ($fieldTypes as $fieldType) {
                                $options[$fieldType->getNamespace()] = trans($fieldType->getName());
                            }

                            return $options;
                        }
                    ]
                ],
                'name'         => [
                    'label' => 'Name',
                    'type'  => 'anomaly.field_type.text'
                ],
                'slug'         => [
                    'label'  => 'Slug',
                    'type'   => 'anomaly.field_type.slug',
                    'config' => [
                        'separator' => '_',
                        'watch'     => 'name'
                    ]
                ],
                'required'     => [
                    'label'  => 'Required',
                    'type'   => 'anomaly.field_type.boolean',
                    'config' => [
                        'text' => 'Yes, this field is required.'
                    ]
                ],
                'unique'       => [
                    'label'  => 'Unique',
                    'type'   => 'anomaly.field_type.boolean',
                    'config' => [
                        'text' => 'Yes, this field is unique.'
                    ]
                ],
                'instructions' => [
                    'label' => 'Instructions',
                    'type'  => 'anomaly.field_type.textarea'
                ]
            ]
        )
            ->setButtons(['cancel']);

        $builder->getForm()->on(
            'saving',
            function (Form $form) {

                $entry = $form->getEntry();

                $form->getFields()->forget('instructions');
                $form->getFields()->forget('required');
                $form->getFields()->forget('unique');

                $entry->namespace = 'users';
            }
        );

        $builder->getForm()->on(
            'saved',
            function (Form $form, StreamRepository $streams, AssignmentModel $assignments) {

                /* @var FieldModel $entry */
                $entry = $form->getEntry();

                $assignment = $entry->getAssignments()->first();

                if (!$assignment) {
                    $assignment = $assignments->newInstance();
                }

                $assignment->stream_id = $streams->findBySlugAndNamespace('users', 'users')->getId();
                $assignment->field_id  = $entry->getId();

                $assignment->save();
            }
        );

        return $builder->render();
    }

    /**
     * Return a form for an existing field.
     *
     * @param FormBuilder $builder
     * @param             $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(FormBuilder $builder, $id)
    {
        return $builder->render($id);
    }
}
