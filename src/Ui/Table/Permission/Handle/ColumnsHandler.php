<?php namespace Anomaly\UsersModule\Ui\Table\Permission\Handle;

use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Html\FormBuilder;

/**
 * Class ColumnsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\Permission\Handle
 */
class ColumnsHandler
{

    /**
     * The role repository.
     *
     * @var \Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface
     */
    protected $roles;

    /**
     * The Form builder.
     *
     * @var FormBuilder
     */
    protected $form;

    /**
     * Create a new ColumnsHandler instance.
     *
     * @param RoleRepositoryInterface $roles
     */
    public function __construct(RoleRepositoryInterface $roles, FormBuilder $form)
    {
        $this->form  = $form;
        $this->roles = $roles;
    }

    /**
     * Return the table columns.
     *
     * @return array
     */
    public function handle()
    {
        $columns = [
            [
                'heading' => 'Name',
                'value'   => function ($entry) {
                        return "<strong>{$entry->name}</strong><br><small>{$entry->description}</small>";
                    }
            ]
        ];

        $this->addRoleColumns($columns);

        return $columns;
    }

    /**
     * Add columns for each role.
     *
     * @param array $columns
     */
    protected function addRoleColumns(array &$columns)
    {
        $roles = $this->roles->all();

        foreach ($roles as $role) {
            if ($role instanceof RoleInterface) {
                $columns[$role->getSlug()] = [
                    'class'   => 'text-center',
                    'heading' => $role->getName(),
                    'value'   => $this->form->checkbox('permission[]', 1, false),
                ];
            }
        }
    }
}
