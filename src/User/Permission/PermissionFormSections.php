<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Contracts\Config\Repository;

/**
 * Class PermissionFormSections
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PermissionFormSections
{

    /**
     * Handle the fields.
     *
     * @param PermissionFormBuilder $builder
     * @param AddonCollection $addons
     * @param Repository $config
     */
    public function handle(
        PermissionFormBuilder $builder,
        AddonCollection $addons,
        Repository $config
    )
    {
        $sections = [];

        array_set($sections, 'streams.title', 'streams::message.system');

        foreach ($config->get('streams::permissions', []) as $group => $permissions) {

            $count = count(array_get($sections, 'streams.fields'));

            array_set($sections, "streams.fields.{$count}", "streams::{$group}");
        }

        /* @var Addon $addon */
        foreach ($addons->withConfig('permissions') as $addon) {

            $namespace = str_replace('.', '_', $addon->getNamespace());

            array_set($sections, "{$namespace}.title", $addon->getName());
            array_set($sections, "{$namespace}.description", $addon->getDescription());

            foreach ($config->get($addon->getNamespace('permissions'), []) as $group => $permissions) {

                $count = count(array_get($sections, "{$namespace}.fields"));

                array_set(
                    $sections,
                    "{$namespace}.fields.{$count}",
                    str_replace('.', '_', $addon->getNamespace($group))
                );
            }
        }

        $builder->setSections($sections);
    }

}
