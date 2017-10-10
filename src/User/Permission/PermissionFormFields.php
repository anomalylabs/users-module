<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Translation\Translator;

/**
 * Class PermissionFormFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PermissionFormFields
{

    /**
     * Handle the fields.
     *
     * @param PermissionFormBuilder $builder
     * @param AddonCollection $addons
     * @param Translator $translator
     * @param Repository $config
     */
    public function handle(
        PermissionFormBuilder $builder,
        AddonCollection $addons,
        Translator $translator,
        Repository $config
    ) {
        /* @var UserInterface $user */
        /* @var RoleCollection $roles */
        $user  = $builder->getEntry();
        $roles = $user->getRoles();

        $inherited = $roles->permissions();
        $fields    = [];

        $namespaces = array_merge(
            ['streams'],
            $addons->withConfig('permissions')->namespaces()
        );

        /*
         * gather all the addons with a
         * permissions configuration file.
         */
        foreach ($namespaces as $namespace) {

            foreach ($config->get("{$namespace}::permissions", []) as $group => $permissions) {

                /*
                 * Determine the general
                 * form UI components.
                 */
                if (!$translator->has(
                    $warning = $this->getWarning($namespace, $group)
                )) {
                    $warning = null;
                }

                if (!$translator->has(
                    $instructions = $this->getInstructions($namespace, $group)
                )) {
                    $instructions = null;
                }

                /*
                 * Gather the available
                 * permissions for the group.
                 */
                $available = array_combine(
                    array_map(
                        function ($permission) use ($namespace, $group) {
                            return "{$namespace}::{$group}.{$permission}";
                        },
                        $permissions
                    ),
                    array_map(
                        function ($permission) use ($namespace, $group) {
                            return "{$namespace}::permission.{$group}.option.{$permission}";
                        },
                        $permissions
                    )
                );


                /*
                 * Build the checkboxes field
                 * type to handle the UI.
                 */
                $fields[str_replace('.', '_', "{$namespace}::{$group}")] = [
                    'label'        => $this->getName($namespace, $group),
                    'warning'      => $warning,
                    'instructions' => $instructions,
                    'type'         => 'anomaly.field_type.checkboxes',
                    'value'        => array_merge($user->getPermissions(), $inherited),
                    'config'       => [
                        'disabled' => $inherited,
                        'options'  => $available,
                    ],
                ];
            }
        }

        $builder->setFields($fields);
    }

    /**
     * Map calling class method.
     *
     * @param string $method
     * @param array  $parameters
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'get')) {
            $namespace = array_get($parameters, 0);
            $group     = array_get($parameters, 1);
            $key       = strtolower(str_replace('get', '', $method));

            return "{$namespace}::permission.{$group}.{$key}";
        }
    }

}
