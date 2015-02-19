<?php namespace Anomaly\UsersModule\User\Command;

/**
 * Class CreateUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class CreateUser
{

    /**
     * The user attributes.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Create a new CreateUser instance.
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
