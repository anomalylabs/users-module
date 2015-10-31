<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Config\Repository;
use Illuminate\Translation\Translator;

/**
 * Class PermissionFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Permission
 */
class PermissionFormFields
{

    /**
     * Handle the fields.
     *
     * @param PermissionFormBuilder $builder
     * @param AddonCollection       $addons
     * @param Translator            $translator
     * @param Repository            $config
     */
    public function handle(
        PermissionFormBuilder $builder,
        AddonCollection $addons,
        Translator $translator,
        Repository $config
    ) {
        /* @var UserInterface $user */
        $user = $builder->getEntry();

        $fields = [];

        /* @var Addon $addon */
        foreach ($addons->withConfig('permissions') as $addon) {
            foreach ($config->get($addon->getNamespace('permissions'), []) as $group => $permissions) {

                $label = $addon->getNamespace('permission.' . $group . '.name');

                if (!$translator->has($warning = $addon->getNamespace('permission.' . $group . '.warning'))) {
                    $warning = null;
                }

                if (!$translator->has($instructions = $addon->getNamespace('permission.' . $group . '.instructions'))) {
                    $instructions = null;
                }

                $fields[$addon->getNamespace($group)] = [
                    'label'        => $label,
                    'warning'      => $warning,
                    'instructions' => $instructions,
                    'type'         => 'anomaly.field_type.checkboxes',
                    'value'        => function () use ($user, $addon, $group) {
                        return array_map(
                            function ($permission) use ($user, $addon, $group) {
                                return str_replace($addon->getNamespace($group) . '.', '', $permission);
                            },
                            $user->getPermissions()
                        );
                    },
                    'config'       => [
                        'options' => function () use ($group, $permissions, $addon) {
                            return array_combine(
                                $permissions,
                                array_map(
                                    function ($permission) use ($addon, $group) {
                                        return $addon->getNamespace('permission.' . $group . '.option.' . $permission);
                                    },
                                    $permissions
                                )
                            );
                        }
                    ]
                ];
            }
        }

        $builder->setFields($fields);
    }
}
