<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Command;

/**
 * Class DeleteRoleCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role\Command
 */
class DeleteRoleCommand
{

    /**
     * The role slug.
     *
     * @var
     */
    protected $slug;

    /**
     * Create a new DeleteRoleCommand instance.
     *
     * @param $slug
     */
    function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get the slug.
     *
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
 