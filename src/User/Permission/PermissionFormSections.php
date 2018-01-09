<?php namespace Anomaly\UsersModule\User\Permission;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Translation\Translator;

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
     * @param Translator $translator
     * @param Repository $config
     */
    public function handle(PermissionFormBuilder $builder, AddonCollection $addons, Repository $config)
    {
        $sections = [];

        $sections['streams']['title'] = 'streams::message.system';

        foreach ($config->get('streams::permissions', []) as $group => $permissions) {
            $sections['streams']['fields'][] = 'streams::' . $group;
        }

        /* @var Addon $addon */
        foreach ($addons->withConfig('permissions') as $addon) {

            $sections[$addon->getNamespace()]['title']       = $addon->getName();
            $sections[$addon->getNamespace()]['description'] = $addon->getDescription();

            foreach ($config->get($addon->getNamespace('permissions'), []) as $group => $permissions) {

                $sections[$addon->getNamespace()]['fields'][] = str_replace('.', '_', $addon->getNamespace($group));
            }
        }

        $builder->setSections($sections);
    }
}
