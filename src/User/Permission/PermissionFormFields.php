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
        foreach ($addons->merged()->withConfig('permissions') as $addon) {
            foreach ($config->get($addon->getNamespace('permissions'), []) as $group => $permissions) {
                foreach ($permissions as $permission) {

                    if ($translator->has('anomaly.module.users::permission.default.' . $permission)) {
                        $label = 'anomaly.module.users::permission.default.' . $permission;
                    } else {
                        $label = $addon->getNamespace('permission.' . $group . '.' . $permission);
                    }

                    $instructions = null;

                    if ($translator->has($addon->getNamespace('permission.default.' . $permission . '_instructions'))) {
                        $instructions = $addon->getNamespace('permission.default.' . $permission . '_instructions');
                    } elseif ($translator->has(
                        $addon->getNamespace('permission.' . $group . '.' . $permission . '_instructions')
                    )
                    ) {
                        $instructions = $addon->getNamespace(
                            'permission.' . $group . '.' . $permission . '_instructions'
                        );
                    }

                    $fields[$addon->getNamespace($group . '.' . $permission)] = [
                        'label'        => $label,
                        'instructions' => $instructions,
                        'type'         => 'anomaly.field_type.boolean',
                        'value'        => $user->hasPermission($addon->getNamespace($group . '.' . $permission), true),
                        'config'       => [
                            'off_color' => 'danger'
                        ]
                    ];
                }
            }
        }

        $builder->setFields($fields);
    }
}
