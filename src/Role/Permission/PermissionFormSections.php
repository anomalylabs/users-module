<?php namespace Anomaly\UsersModule\Role\Permission;

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
 * @package       Anomaly\UsersModule\Role\Permission
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
        foreach ($addons->merged()->withConfig('permissions') as $addon) {
            foreach ($config->get($addon->getNamespace('permissions'), []) as $group => $permissions) {

                $sections[$addon->getNamespace()]['tabs'][str_slug($addon->getNamespace($group))]['fields'] = [];

                $sections[$addon->getNamespace()]['tabs'][str_slug(
                    $addon->getNamespace($group)
                )]['title'] = $addon->getNamespace(
                    'permission.section.' . $group . '.title'
                );

                $sections[$addon->getNamespace()]['title']       = $addon->getName();
                $sections[$addon->getNamespace()]['description'] = $addon->getDescription();

                /*$sections[$addon->getNamespace($group)]['description'] = $addon->getNamespace(
                    'permission.section.' . $group . '.description'
                );*/

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
