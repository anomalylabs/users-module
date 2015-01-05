<?php namespace Anomaly\UsersModule\Ui\Form\Role\Handler;

/**
 * Class FieldHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Form\Role\Handler
 */
class FieldHandler
{

    /**
     * Return the form fields.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'name',
            'slug',
        ];
    }
}
