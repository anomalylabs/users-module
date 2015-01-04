<?php namespace Anomaly\UsersModule\Ui\Form\User\Handle;

/**
 * Class FieldHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Form\User\Handle
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
            'username',
            'email',
            'password',
        ];
    }
}
