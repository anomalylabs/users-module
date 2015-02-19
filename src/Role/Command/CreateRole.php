<?php namespace Anomaly\UsersModule\Role\Command;

/**
 * Class CreateRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface\Command
 */
class CreateRole
{

    /**
     * The attributes parameters.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Create a new CreateRole instance.
     *
     * @param array $attributes
     */
    function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Get the attributes.
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
