<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Config\Repository;
use Illuminate\Translation\Translator;

/**
 * Class PermissionFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Permission
 */
class PermissionFormSections
{

    /**
     * Handle the fields.
     *
     * @param PermissionFormBuilder $builder
     * @param AddonCollection       $addons
     * @param Translator            $translator
     * @param Repository            $config
     */
    public function handle(PermissionFormBuilder $builder, AddonCollection $addons, Repository $config)
    {
        $sections = [];

        /* @var Addon $addon */
        foreach ($addons->withConfig('permissions') as $addon) {
            foreach ($config->get($addon->getNamespace('permissions'), []) as $group => $permissions) {

                $sections[$addon->getNamespace()]['tabs'][str_slug($addon->getNamespace($group))]['fields'] = [];

                $sections[$addon->getNamespace()]['tabs'][str_slug(
                    $addon->getNamespace($group)
                )]['title'] = $addon->getNamespace(
                    'permission.' . $group . '.title'
                );

                $sections[$addon->getNamespace()]['title']       = $addon->getName();
                $sections[$addon->getNamespace()]['description'] = $addon->getDescription();

                foreach ($permissions as $permission) {

                    $sections[$addon->getNamespace()]['tabs'][str_slug(
                        $addon->getNamespace($group)
                    )]['fields'][] = $addon->getNamespace(
                        $group . '.' . $permission
                    );
                }
            }
        }

        $builder->setSections($sections);
    }
}
