<?php namespace Anomaly\UsersModule\Addon\FieldType;

use Anomaly\TextFieldType\TextFieldType;

/**
 * Class PasswordTextFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Addon\FieldType
 */
class PasswordTextFieldType extends TextFieldType
{

    /**
     * Get view data for the input view.
     *
     * @return array
     */
    public function getInputData()
    {
        $data = parent::getInputData();

        $data['type']  = 'password';
        $data['value'] = null;

        return $data;
    }
}
 